<?php

namespace Gathern\CasdoorAPI\Requests\RoleApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.DeleteRole
 *
 * delete role
 */
class ApiControllerDeleteRole extends MainRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/delete-role';
    }

    public function __construct() {}
}
