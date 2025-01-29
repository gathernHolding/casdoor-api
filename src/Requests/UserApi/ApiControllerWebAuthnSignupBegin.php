<?php

namespace Gathern\CasdoorAPI\Requests\UserApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Enums\Method;

/**
 * ApiController.WebAuthnSignupBegin
 *
 * WebAuthn Registration Flow 1st stage
 */
class ApiControllerWebAuthnSignupBegin extends MainRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/webauthn/signup/begin';
    }

    public function __construct() {}
}
