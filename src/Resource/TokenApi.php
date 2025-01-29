<?php

namespace Gathern\CasdoorAPI\Resource;

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

    /**
     * @param  mixed  $grantType  OAuth grant type
     * @param  mixed  $clientId  OAuth client id
     * @param  mixed  $clientSecret  OAuth client secret
     * @param  mixed  $code  OAuth code
     */
    public function apiControllerGetOauthToken(
        mixed $grantType,
        mixed $clientId,
        mixed $clientSecret,
        mixed $code,
    ): Response {
        return $this->connector->send(new ApiControllerGetOauthToken($grantType, $clientId, $clientSecret, $code));
    }

    /**
     * @param  mixed  $grantType  OAuth grant type
     * @param  mixed  $refreshToken  OAuth refresh token
     * @param  mixed  $scope  OAuth scope
     * @param  mixed  $clientId  OAuth client id
     * @param  mixed  $clientSecret  OAuth client secret
     */
    public function apiControllerRefreshToken(
        mixed $grantType,
        mixed $refreshToken,
        mixed $scope,
        mixed $clientId,
        mixed $clientSecret,
    ): Response {
        return $this->connector->send(new ApiControllerRefreshToken($grantType, $refreshToken, $scope, $clientId, $clientSecret));
    }

    /**
     * @param  mixed  $id  The id ( owner/name ) of token
     */
    public function apiControllerUpdateToken(mixed $id): Response
    {
        return $this->connector->send(new ApiControllerUpdateToken($id));
    }
}
