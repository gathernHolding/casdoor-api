<?php

namespace Gathern\CasdoorAPI\Requests\TokenApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.DeleteToken
 *
 * delete token
 */
class ApiControllerDeleteToken extends MainRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/delete-token';
    }

    public function __construct() {}
}
