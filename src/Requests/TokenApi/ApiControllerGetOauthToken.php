<?php

namespace Gathern\CasdoorAPI\Requests\TokenApi;

use Gathern\CasdoorAPI\DTO\OauthTokenResponseData;
use Gathern\CasdoorAPI\Enum\GrantType;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.GetOAuthToken
 *
 * get OAuth access token
 */
class ApiControllerGetOauthToken extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/login/oauth/access_token';
    }

    public function __construct(
        protected string $clientId,
        protected ?string $clientSecret = null,
        protected GrantType $grantType = GrantType::AUTHORIZATION_CODE,
        protected ?string $code = null,
        protected ?string  $username = null,
        protected ?string  $password = null,
    ) {}

    /**
     * Summary of defaultBody
     *
     * @return array<string, mixed>
     */
    public function defaultBody(): array
    {
        return array_filter(array: array_filter(array: [
            'grant_type' => $this->grantType,
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'code' => $this->code,
            'username' => $this->username,
            'password' => $this->password,
        ]));
    }

    public function createDtoFromResponse(Response $response): OauthTokenResponseData
    {
        /**
         * @var array{access_token?: string, id_token?: string, token_type?: string, expires_in?: int, scope?: string[]|string, refresh_token?: string} $data
         */
        $data = $response->json();

        return new OauthTokenResponseData(
            accessToken: $data['access_token'] ?? null,
            idToken: $data['id_token'] ?? null,
            tokenType: $data['token_type'] ?? null,
            expiresIn: $data['expires_in'] ?? null,
            scope: is_string($data['scope'] ?? []) ? explode(' ', $data['scope']) : $data['scope'] ?? [],
            refreshToken: $data['refresh_token'] ?? null,

        );
    }
}
