<?php

namespace Gathern\CasdoorAPI\Resource;

use Gathern\CasdoorAPI\Enum\GrantType;
use Gathern\CasdoorAPI\Requests\TokenApi\ApiControllerAddToken;
use Gathern\CasdoorAPI\Requests\TokenApi\ApiControllerDeleteToken;
use Gathern\CasdoorAPI\Requests\TokenApi\ApiControllerGetCaptchaStatus;
use Gathern\CasdoorAPI\Requests\TokenApi\ApiControllerGetOauthToken;
use Gathern\CasdoorAPI\Requests\TokenApi\ApiControllerGetToken;
use Gathern\CasdoorAPI\Requests\TokenApi\ApiControllerGetTokens;
use Gathern\CasdoorAPI\Requests\TokenApi\ApiControllerRefreshToken;
use Gathern\CasdoorAPI\Requests\TokenApi\ApiControllerUpdateToken;
use Gathern\CasdoorAPI\Resource;
use Saloon\Http\Response;

class TokenApi extends Resource
{
    public function apiControllerAddToken(): Response
    {
        return $this->connector->send(new ApiControllerAddToken);
    }

    public function apiControllerDeleteToken(): Response
    {
        return $this->connector->send(new ApiControllerDeleteToken);
    }

    /**
     * @param  mixed  $id  The id ( owner/name ) of user
     */
    public function apiControllerGetCaptchaStatus(mixed $id): Response
    {
        return $this->connector->send(new ApiControllerGetCaptchaStatus($id));
    }

    /**
     * @param  mixed  $id  The id ( owner/name ) of token
     */
    public function apiControllerGetToken(mixed $id): Response
    {
        return $this->connector->send(new ApiControllerGetToken($id));
    }

    /**
     * @param  mixed  $owner  The owner of tokens
     * @param  mixed  $pageSize  The size of each page
     * @param  mixed  $p  The number of the page
     */
    public function apiControllerGetTokens(mixed $owner, mixed $pageSize, mixed $p): Response
    {
        return $this->connector->send(new ApiControllerGetTokens($owner, $pageSize, $p));
    }

    public function apiControllerGetOauthToken(
        string $clientId,
        string $clientSecret,
        GrantType $grantType = GrantType::AUTHORIZATION_CODE,
        ?string $code = null,
    ): Response {
        return $this->connector->send(new ApiControllerGetOauthToken(
            clientId: $clientId,
            clientSecret: $clientSecret,
            grantType: $grantType,
            code: $code
        ));
    }

    public function apiControllerRefreshToken(
        GrantType $grantType,
        string $refreshToken,
        ?string $scope = null,
        ?string $clientId = null,
        ?string $clientSecret = null,
    ): Response {
        return $this->connector->send(new ApiControllerRefreshToken(
            grantType: $grantType,
            refreshToken: $refreshToken,
            scope: $scope,
            clientId: $clientId,
            clientSecret: $clientSecret
        ));
    }

    /**
     * @param  mixed  $id  The id ( owner/name ) of token
     */
    public function apiControllerUpdateToken(mixed $id): Response
    {
        return $this->connector->send(new ApiControllerUpdateToken($id));
    }
}
