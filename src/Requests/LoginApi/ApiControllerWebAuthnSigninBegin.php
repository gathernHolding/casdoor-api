<?php

namespace Gathern\CasdoorAPI\Requests\LoginApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Enums\Method;

/**
 * ApiController.WebAuthnSigninBegin
 *
 * WebAuthn Login Flow 1st stage
 */
class ApiControllerWebAuthnSigninBegin extends MainRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/webauthn/signin/begin';
    }

    /**
     * @param  mixed  $owner  owner
     * @param  mixed  $name  name
     */
    public function __construct(
        protected mixed $owner,
        protected mixed $name,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['owner' => $this->owner, 'name' => $this->name]);
    }
}
