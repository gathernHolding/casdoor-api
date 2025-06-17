<?php

use Gathern\CasdoorAPI\CasdoorConnector;
use Gathern\CasdoorAPI\Enum\GrantType;
use Gathern\CasdoorAPI\Enum\ResponseStatus;
use Gathern\CasdoorAPI\Enum\SignInMethod;
use Gathern\CasdoorAPI\Requests\LoginApi\ApiControllerLogin;
use Gathern\CasdoorAPI\Requests\TokenApi\ApiControllerGetOauthToken;
use Gathern\CasdoorAPI\Requests\UserApi\ApiControllerAddUser;
use Gathern\CasdoorAPI\Requests\UserApi\ApiControllerSetUserPassword;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

describe('UserApiTest', function (): void {

    beforeEach(function (): void {
        $this->connector = new CasdoorConnector;
    });
    it('Add new  User Successfully', function (): void {
        $this->connector->withMockClient(new MockClient([
            ApiControllerAddUser::class => MockResponse::fixture('Users/success'),
        ]));
        $response = $this->connector->userApi()->apiControllerAddUser(
            name: 'test_user_1'
        );
        expect(value: $response->json()['data'])->toBe('Affected');

    });
    it('fails to add duplicated  User ', function (): void {
        $this->connector->withMockClient(new MockClient([
            ApiControllerAddUser::class => MockResponse::fixture('Users/error'),
        ]));
        $response = $this->connector->userApi()->apiControllerAddUser(
            name: 'admin2'
        );
        $responseBody = $response->dto();
        expect(value: $responseBody->status)->toBe(ResponseStatus::ERROR)
            ->and($responseBody->msg)->toBe('Username already exists');

    });

    it('update user password successfully', function (): void {

        $this->connector->withMockClient(new MockClient([
            ApiControllerSetUserPassword::class => MockResponse::fixture('Users/set-password/ok'),
        ]));
        $response = $this->connector->userApi()->apiControllerSetUserPassword(
            userName: '1',
            newPassword: '123456',
        );
        $responseBody = $response->dto();
        expect(value: $responseBody->status)->toBe(ResponseStatus::OK);

    });

    it('login the user using username and password to get the jwt token succesfully', function (): void {
        $this->connector->withMockClient(new MockClient([
            ApiControllerLogin::class => MockResponse::fixture('Users/login/by-password/ok'),
        ]));
        $response = $this->connector->loginApi()->apiControllerLogin(
            application: 'app-built-in',
            username: 'admin',
            signinMethod: SignInMethod::PASSWORD,

            password: '123'
        );

        expect(value: $response->dto()->status)->toBe(ResponseStatus::OK)
            ->and($response->dto()->data)->toBeString();
    });

    it('login the user using client creds to get the jwt token succesfully', function (): void {
        $this->connector->withMockClient(new MockClient([
            ApiControllerGetOauthToken::class => MockResponse::fixture('Users/login/oauth/ok'),
        ]));
        $response = $this->connector->TokenApi()->apiControllerGetOauthToken(
            clientId: getenv('AUTH_CLIENT_ID'),
            clientSecret: getenv('AUTH_CLIENT_SECRET'),
            grantType: GrantType::CLIENT_CREDENTIALS,
        );
        expect(value: $response->dto()->accessToken)->not->toBeNull();
    });

});
