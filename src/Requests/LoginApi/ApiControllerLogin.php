<?php

namespace Gathern\CasdoorAPI\Requests\LoginApi;

use DateTime;
use Gathern\CasdoorAPI\Enum\LoginType;
use Gathern\CasdoorAPI\Enum\SignInMethod;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.Login
 *
 * login
 */
class ApiControllerLogin extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/login";
    }

    /**
     * @param string $clientId clientId
     * @param string|null $responseType responseType
     * @param string|null $redirectUri redirectUri
     * @param string|null $scope scope
     * @param string|null $state state
     * @param bool|null $nonce nonce
     * @param null|string $codeChallengeMethod code_challenge_method
     * @param null|string $codeChallenge code_challenge
     */
    public function __construct(
        protected string $application,
        protected string $username,
        protected SignInMethod $signinMethod = SignInMethod::VerificationCode,
        protected LoginType $type = LoginType::TOKEN,
        protected string $password = null,
        protected string $code = null,
    ) {
    }
    /**
     * Default body
     *
     * @return array<string, mixed>
     */
    protected function defaultBody(): array
    {
        return array_filter([
            "application" => $this->application,
            "signinMethod" => $this->signinMethod,
            "type" => $this->type,
            "username" => $this->username,
            "password" => $this->password,
            "code" => $this->code,
        ]);
    }
}
