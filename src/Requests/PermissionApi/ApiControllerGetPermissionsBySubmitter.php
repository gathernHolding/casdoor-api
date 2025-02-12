<?php

namespace Gathern\CasdoorAPI\Requests\PermissionApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Enums\Method;

/**
 * ApiController.GetPermissionsBySubmitter
 *
 * get permissions by submitter
 */
class ApiControllerGetPermissionsBySubmitter extends MainRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/get-permissions-by-submitter';
    }

    public function __construct() {}
}
