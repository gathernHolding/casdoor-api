<?php

namespace Gathern\CasdoorAPI\Requests\LoginApi;

use Gathern\CasdoorAPI\Enum\LoginType;
use Gathern\CasdoorAPI\Enum\SignInMethod;
use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.Login
 *
 * login
 */
class ApiControllerLogin extends MainRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/login';
    }

    public function __construct(
        protected string $application,
        protected string $username,
        protected SignInMethod $signinMethod = SignInMethod::VerificationCode,
        protected LoginType $type = LoginType::TOKEN,
        protected ?string $password = null,
        protected ?string $code = null,
    ) {}

    /**
     * Default body
     *
     * @return array<string, mixed>
     */
    protected function defaultBody(): array
    {
        return array_filter([
            'application' => $this->application,
            'signinMethod' => $this->signinMethod,
            'type' => $this->type,
            'username' => $this->username,
            'password' => $this->password,
            'code' => $this->code,
        ]);
    }
}
