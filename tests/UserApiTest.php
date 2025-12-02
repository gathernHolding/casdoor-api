<?php

use Gathern\CasdoorAPI\CasdoorConnector;
use Gathern\CasdoorAPI\Enum\GrantType;
use Gathern\CasdoorAPI\Enum\ResponseStatus;
use Gathern\CasdoorAPI\Enum\SignInMethod;
use Gathern\CasdoorAPI\Requests\LoginApi\ApiControllerLogin;
use Gathern\CasdoorAPI\Requests\LoginApi\ApiControllerLogout;
use Gathern\CasdoorAPI\Requests\TokenApi\ApiControllerGetOauthToken;
use Gathern\CasdoorAPI\Requests\TokenApi\ApiControllerRefreshToken;
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

    it('can refresh token sucessfully', function (): void {
        $this->connector->withMockClient(new MockClient([
            ApiControllerRefreshToken::class => MockResponse::fixture('Users/login/refresh_token/ok'),
        ]));
        $response = $this->connector->TokenApi()->apiControllerRefreshToken(
            clientId: getenv('AUTH_CLIENT_ID'),
            grantType: GrantType::REFRESH_TOKEN,
            refreshToken: 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJvd25lciI6ImxvY2FsX29yZ2FuaXphdGlvbiIsIm5hbWUiOiJsb2NhbF9vcmdhbml6YXRpb25fODI1NmNjMzYtMzQ3Yy00N2Q1LWFiNDMtMGU5ZWI3YjM0NmRkIiwiY3JlYXRlZFRpbWUiOiIyMDI1LTEwLTI4VDE0OjAwOjIyWiIsInVwZGF0ZWRUaW1lIjoiMjAyNS0xMi0wMVQxMjozMToyMVoiLCJkZWxldGVkVGltZSI6IiIsImlkIjoibG9jYWxfb3JnYW5pemF0aW9uXzUxMTAwIiwidHlwZSI6IiIsInBhc3N3b3JkIjoiIiwicGFzc3dvcmRTYWx0IjoiIiwicGFzc3dvcmRUeXBlIjoicGxhaW4iLCJkaXNwbGF5TmFtZSI6Ik1haHJhbiBFbG5lZWwiLCJmaXJzdE5hbWUiOiIiLCJsYXN0TmFtZSI6IiIsImF2YXRhciI6IiIsImF2YXRhclR5cGUiOiIiLCJwZXJtYW5lbnRBdmF0YXIiOiIiLCJlbWFpbCI6IiIsImVtYWlsVmVyaWZpZWQiOmZhbHNlLCJwaG9uZSI6IiIsImNvdW50cnlDb2RlIjoiIiwicmVnaW9uIjoiIiwibG9jYXRpb24iOiItLSIsImFkZHJlc3MiOltdLCJhZmZpbGlhdGlvbiI6IiIsInRpdGxlIjoiIiwiaWRDYXJkVHlwZSI6IiIsImlkQ2FyZCI6IiIsImhvbWVwYWdlIjoiIiwiYmlvIjoiIiwibGFuZ3VhZ2UiOiIiLCJnZW5kZXIiOiJtYWxlIiwiYmlydGhkYXkiOiIiLCJlZHVjYXRpb24iOiIiLCJzY29yZSI6MCwia2FybWEiOjAsInJhbmtpbmciOjIsImlzRGVmYXVsdEF2YXRhciI6ZmFsc2UsImlzT25saW5lIjpmYWxzZSwiaXNBZG1pbiI6ZmFsc2UsImlzRm9yYmlkZGVuIjpmYWxzZSwiaXNEZWxldGVkIjpmYWxzZSwic2lnbnVwQXBwbGljYXRpb24iOiIiLCJoYXNoIjoiIiwicHJlSGFzaCI6IiIsImFjY2Vzc0tleSI6IiIsImFjY2Vzc1NlY3JldCI6IiIsImdpdGh1YiI6IiIsImdvb2dsZSI6IiIsInFxIjoiIiwid2VjaGF0IjoiIiwiZmFjZWJvb2siOiIiLCJkaW5ndGFsayI6IiIsIndlaWJvIjoiIiwiZ2l0ZWUiOiIiLCJsaW5rZWRpbiI6IiIsIndlY29tIjoiIiwibGFyayI6IiIsImdpdGxhYiI6IiIsImNyZWF0ZWRJcCI6IiIsImxhc3RTaWduaW5UaW1lIjoiIiwibGFzdFNpZ25pbklwIjoiIiwicHJlZmVycmVkTWZhVHlwZSI6IiIsInJlY292ZXJ5Q29kZXMiOm51bGwsInRvdHBTZWNyZXQiOiIiLCJtZmFQaG9uZUVuYWJsZWQiOmZhbHNlLCJtZmFFbWFpbEVuYWJsZWQiOmZhbHNlLCJsZGFwIjoiIiwicHJvcGVydGllcyI6eyJjaXR5IjoiUml5YWRoIiwiZnJlZV9yZXNlcnZhdGlvbnMiOiIwIiwiaGVhcmVkX2Zyb20iOiIiLCJwZXJjZW50IjoiMTUiLCJ0YXhvbm9teSI6IiIsInZpYSI6IiJ9LCJyb2xlcyI6W3sib3duZXIiOiJsb2NhbF9vcmdhbml6YXRpb24iLCJuYW1lIjoiYWNjb3VudGFudCIsImNyZWF0ZWRUaW1lIjoiIiwiZGlzcGxheU5hbWUiOiIiLCJkZXNjcmlwdGlvbiI6IiIsInVzZXJzIjpudWxsLCJncm91cHMiOlsibG9jYWxfb3JnYW5pemF0aW9uL2FjY291bnRhbnQiXSwicm9sZXMiOm51bGwsImRvbWFpbnMiOm51bGwsImlzRW5hYmxlZCI6dHJ1ZX0seyJvd25lciI6ImxvY2FsX29yZ2FuaXphdGlvbiIsIm5hbWUiOiJhZG1pbmlzdHJhdG9yIiwiY3JlYXRlZFRpbWUiOiIiLCJkaXNwbGF5TmFtZSI6IiIsImRlc2NyaXB0aW9uIjoiIiwidXNlcnMiOm51bGwsImdyb3VwcyI6WyJsb2NhbF9vcmdhbml6YXRpb24vYWRtaW5pc3RyYXRvciJdLCJyb2xlcyI6bnVsbCwiZG9tYWlucyI6bnVsbCwiaXNFbmFibGVkIjp0cnVlfSx7Im93bmVyIjoibG9jYWxfb3JnYW5pemF0aW9uIiwibmFtZSI6ImIyYl9hZG1pbmlzdHJhdG9yIiwiY3JlYXRlZFRpbWUiOiIiLCJkaXNwbGF5TmFtZSI6IiIsImRlc2NyaXB0aW9uIjoiIiwidXNlcnMiOm51bGwsImdyb3VwcyI6WyJsb2NhbF9vcmdhbml6YXRpb24vYjJiX2FkbWluaXN0cmF0b3IiXSwicm9sZXMiOm51bGwsImRvbWFpbnMiOm51bGwsImlzRW5hYmxlZCI6dHJ1ZX0seyJvd25lciI6ImxvY2FsX29yZ2FuaXphdGlvbiIsIm5hbWUiOiJpbnZlc3RvcnMiLCJjcmVhdGVkVGltZSI6IiIsImRpc3BsYXlOYW1lIjoiIiwiZGVzY3JpcHRpb24iOiIiLCJ1c2VycyI6bnVsbCwiZ3JvdXBzIjpbImxvY2FsX29yZ2FuaXphdGlvbi9pbnZlc3RvcnMiXSwicm9sZXMiOm51bGwsImRvbWFpbnMiOm51bGwsImlzRW5hYmxlZCI6dHJ1ZX0seyJvd25lciI6ImxvY2FsX29yZ2FuaXphdGlvbiIsIm5hbWUiOiJzYWxlcyIsImNyZWF0ZWRUaW1lIjoiIiwiZGlzcGxheU5hbWUiOiIiLCJkZXNjcmlwdGlvbiI6IiIsInVzZXJzIjpudWxsLCJncm91cHMiOlsibG9jYWxfb3JnYW5pemF0aW9uL3NhbGVzIl0sInJvbGVzIjpudWxsLCJkb21haW5zIjpudWxsLCJpc0VuYWJsZWQiOnRydWV9LHsib3duZXIiOiJsb2NhbF9vcmdhbml6YXRpb24iLCJuYW1lIjoidXNlciIsImNyZWF0ZWRUaW1lIjoiIiwiZGlzcGxheU5hbWUiOiIiLCJkZXNjcmlwdGlvbiI6IiIsInVzZXJzIjpudWxsLCJncm91cHMiOlsibG9jYWxfb3JnYW5pemF0aW9uL3VzZXIiXSwicm9sZXMiOm51bGwsImRvbWFpbnMiOm51bGwsImlzRW5hYmxlZCI6dHJ1ZX1dLCJwZXJtaXNzaW9ucyI6W10sImdyb3VwcyI6WyJsb2NhbF9vcmdhbml6YXRpb24vYWRtaW5pc3RyYXRvciIsImxvY2FsX29yZ2FuaXphdGlvbi9zYWxlcyIsImxvY2FsX29yZ2FuaXphdGlvbi9hY2NvdW50YW50IiwibG9jYWxfb3JnYW5pemF0aW9uL3VzZXIiLCJsb2NhbF9vcmdhbml6YXRpb24vaW52ZXN0b3JzIiwibG9jYWxfb3JnYW5pemF0aW9uL2IyYl9hZG1pbmlzdHJhdG9yIl0sImxhc3RTaWduaW5Xcm9uZ1RpbWUiOiIiLCJzaWduaW5Xcm9uZ1RpbWVzIjowLCJtYW5hZ2VkQWNjb3VudHMiOm51bGwsInRva2VuVHlwZSI6InJlZnJlc2gtdG9rZW4iLCJ0YWciOiIiLCJhenAiOiIwMDVhMGRhZWMzYzliYjk1NzBjNiIsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCIsInN1YiI6ImxvY2FsX29yZ2FuaXphdGlvbl81MTEwMCIsImF1ZCI6WyIwMDVhMGRhZWMzYzliYjk1NzBjNiJdLCJleHAiOjE3NjUyODU1OTIsIm5iZiI6MTc2NDY4MDc5MiwiaWF0IjoxNzY0NjgwNzkyLCJqdGkiOiJhZG1pbi81YTE4ZDE5My05YThiLTQyNDMtYjgwMi1iMzBjYmE2MzZjNDQifQ.vgJGH0QdDsp9PZmUPA06rNQMn5ubMLFytP7GLWbNSoXMwSoTDHHBHW2_pwLHJE_aweb8CNLMf2IRVauGBUX77zczhWpRkCEzT0cDb6PcFC9TLiBdZh3mTaw3KJeGE02ziiIdfJiz84aU7CcdLvVN4NIoR56HXUT3iVJ6JpbYas0MBwMlJMOLcRX3aX7cSOnyCwawOTuXKDsUNJir5ohVu97Nwq1aqa3k_kNrw8YfVNgUW3JqL7yDWOHAuxdVsYB7gq70Kb27Udmz2oDF7tFUlqsCNlT_Uwj9K1pA0-lhLcQvMMn2T7ICCTbYOXJ33BFYxJ5X2T-srmTrMfc8ZqumP2v_NAfZeaaaGF7ASVi9L2xIWMxlwmzzZkYouD4OEhLG0dWG4FUav0wxbTU9jD5MSFUp-4pOTMybQy1kg3JduQDbiuJxL4g_brVybSV6bnwMegqrC3-N4fHpJzU7PsPL0F8MTRPRrbeKKcjUat8vgviwISHWydf1SzizJVXQ07G2jc54xas3RsiPaR2oyngbgztEMbhmXLCiqQnJAf2rMod52eJnms4nFue003LmXeNJcbb5SbqF-4pH4XR9MMqRrZwquFJ93LRCwWJR7bQJAHKSXo8MVL4I0N0iYO-oa9UcNMqV3z2cBKiEhmhh3qjbEp48ZRljJs5Y-uLkh8ublRI',
        );
        expect(value: $response->dto()->accessToken)->not->toBeNull();
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

    it('can not logout user using invalid token  ', function (): void {
        $this->connector->withMockClient(new MockClient([
            ApiControllerLogout::class => MockResponse::fixture('Users/logout/error'),
        ]));
        $response = $this->connector->LoginApi()->apiControllerLogout(
            token: 'invalid_example_id_token',

        )->dto();

        expect(value: $response->status)->toBe(ResponseStatus::ERROR);
    });

    it('can not logout user using  token   successfully', function (): void {
        $this->connector->withMockClient(new MockClient([
            ApiControllerLogout::class => MockResponse::fixture('Users/logout/ok'),
        ]));
        $response = $this->connector->LoginApi()->apiControllerLogout(
            token: 'example_id_token',

        )->dto();

        expect(value: $response->status)->toBe(ResponseStatus::OK);
    });

});
