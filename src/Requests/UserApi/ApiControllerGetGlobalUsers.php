<?php

namespace Gathern\CasdoorAPI\Requests\UserApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Enums\Method;

/**
 * ApiController.GetGlobalUsers
 *
 * get global users
 */
class ApiControllerGetGlobalUsers extends MainRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/get-global-users';
    }

    public function __construct() {}
}
