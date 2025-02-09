<?php

use Gathern\CasdoorAPI\CasdoorConnector;
use Gathern\CasdoorAPI\Enum\ResponseStatus;
use Gathern\CasdoorAPI\Requests\UserApi\ApiControllerAddUser;
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

});
