<?php

namespace Gathern\CasdoorAPI\Requests\TokenApi;

use Gathern\CasdoorAPI\DTO\OauthTokenResponseData;
use Gathern\CasdoorAPI\Enum\GrantType;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * ApiController.RefreshToken
 *
 * refresh OAuth access token
 */
class ApiControllerRefreshToken extends Request
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/login/oauth/refresh_token';
    }

    public function __construct(
        protected string $refreshToken,
        protected ?string $clientId,
        protected GrantType $grantType = GrantType::REFRESH_TOKEN,
        protected ?string $scope = null,
        protected ?string $clientSecret = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'grant_type' => $this->grantType,
            'refresh_token' => $this->refreshToken,
            'scope' => $this->scope,
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
        ]);
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
