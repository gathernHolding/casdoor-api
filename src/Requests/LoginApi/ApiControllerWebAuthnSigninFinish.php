<?php

namespace Gathern\CasdoorAPI\Requests\LoginApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.WebAuthnSigninFinish
 *
 * WebAuthn Login Flow 2nd stage
 */
class ApiControllerWebAuthnSigninFinish extends MainRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/webauthn/signin/finish';
    }

    public function __construct() {}
}
