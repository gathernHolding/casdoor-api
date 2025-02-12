<?php

namespace Gathern\CasdoorAPI\Requests\PermissionApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.AddPermission
 *
 * add permission
 */
class ApiControllerAddPermission extends MainRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/add-permission';
    }

    public function __construct() {}
}
