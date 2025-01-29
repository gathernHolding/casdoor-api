<?php

namespace Gathern\CasdoorAPI\Requests\UserApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.WebAuthnSignupFinish
 *
 * WebAuthn Registration Flow 2nd stage
 */
class ApiControllerWebAuthnSignupFinish extends MainRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/webauthn/signup/finish';
    }

    public function __construct() {}
}
