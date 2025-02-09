<?php

namespace Gathern\CasdoorAPI\Requests\PermissionApi;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.DeletePermission
 *
 * delete permission
 */
class ApiControllerDeletePermission extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/delete-permission';
    }

    public function __construct() {}
}
