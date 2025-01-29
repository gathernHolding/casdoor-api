<?php

namespace Gathern\CasdoorAPI\Requests\LoginApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.IntrospectToken
 *
 * The introspection endpoint is an OAuth 2.0 endpoint that takes a
 */
class ApiControllerIntrospectToken extends MainRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/login/oauth/introspect';
    }

    public function __construct() {}
}
