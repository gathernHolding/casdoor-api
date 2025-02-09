<?php

namespace Gathern\CasdoorAPI\Requests\PermissionApi;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ApiController.GetPermissionsBySubmitter
 *
 * get permissions by submitter
 */
class ApiControllerGetPermissionsBySubmitter extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/get-permissions-by-submitter';
    }

    public function __construct() {}
}
