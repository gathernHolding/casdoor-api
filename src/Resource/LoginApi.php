<?php

namespace Gathern\CasdoorAPI\Resource;

use Gathern\CasdoorAPI\Enum\LoginType;
use Gathern\CasdoorAPI\Enum\SignInMethod;
use Gathern\CasdoorAPI\Requests\LoginApi\ApiControllerGetApplicationLogin;
use Gathern\CasdoorAPI\Requests\LoginApi\ApiControllerGetCaptcha;
use Gathern\CasdoorAPI\Requests\LoginApi\ApiControllerIntrospectToken;
use Gathern\CasdoorAPI\Requests\LoginApi\ApiControllerLogin;
use Gathern\CasdoorAPI\Requests\LoginApi\ApiControllerLogout;
use Gathern\CasdoorAPI\Requests\LoginApi\ApiControllerSignup;
use Gathern\CasdoorAPI\Requests\LoginApi\ApiControllerUnlink;
use Gathern\CasdoorAPI\Requests\LoginApi\ApiControllerWebAuthnSigninBegin;
use Gathern\CasdoorAPI\Requests\LoginApi\ApiControllerWebAuthnSigninFinish;
use Gathern\CasdoorAPI\Resource;
use Saloon\Contracts\Body\HasBody;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class LoginApi extends Resource implements HasBody
{
    use HasJsonBody;
    /**
     * @param mixed $clientId client id
     * @param mixed $responseType response type
     * @param mixed $redirectUri redirect uri
     * @param mixed $scope scope
     * @param mixed $state state
     */
    public function apiControllerGetApplicationLogin(
        mixed $clientId,
        mixed $responseType,
        mixed $redirectUri,
        mixed $scope,
        mixed $state
    ): Response {
        return $this->connector->send(
            new ApiControllerGetApplicationLogin(
                $clientId,
                $responseType,
                $redirectUri,
                $scope,
                $state
            )
        );
    }

    public function apiControllerGetCaptcha(): Response
    {
        return $this->connector->send(new ApiControllerGetCaptcha());
    }

    /**
     * @param mixed $clientId clientId
     * @param mixed $responseType responseType
     * @param mixed $redirectUri redirectUri
     * @param mixed $scope scope
     * @param mixed $state state
     * @param mixed $nonce nonce
     * @param mixed $codeChallengeMethod code_challenge_method
     * @param mixed $codeChallenge code_challenge
     */
    public function apiControllerLogin(
        string $application,
        string $username,
        SignInMethod $signinMethod = SignInMethod::VerificationCode,
        LoginType $type = LoginType::TOKEN,
        string $password = null,
        string $code = null,
    ): Response {
        return $this->connector->send(
            new ApiControllerLogin(
                application: $application,
                username: $username,
                signinMethod: $signinMethod,
                type: $type,
                password: $password,
                code: $code,
            )
        );
    }

    public function apiControllerIntrospectToken(): Response
    {
        return $this->connector->send(new ApiControllerIntrospectToken());
    }

    /**
     * @param mixed $idTokenHint id_token_hint
     * @param mixed $postLogoutRedirectUri post_logout_redirect_uri
     * @param mixed $state state
     */
    public function apiControllerLogout(
        mixed $idTokenHint,
        mixed $postLogoutRedirectUri,
        mixed $state
    ): Response {
        return $this->connector->send(
            new ApiControllerLogout(
                $idTokenHint,
                $postLogoutRedirectUri,
                $state
            )
        );
    }

    public function apiControllerSignup(): Response
    {
        return $this->connector->send(new ApiControllerSignup());
    }

    public function apiControllerUnlink(): Response
    {
        return $this->connector->send(new ApiControllerUnlink());
    }

    /**
     * @param mixed $owner owner
     * @param mixed $name name
     */
    public function apiControllerWebAuthnSigninBegin(
        mixed $owner,
        mixed $name
    ): Response {
        return $this->connector->send(
            new ApiControllerWebAuthnSigninBegin($owner, $name)
        );
    }

}
