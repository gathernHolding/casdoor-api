<?php

namespace Gathern\CasdoorAPI\Requests\UserApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.AddUserKeys
 */
class ApiControllerAddUserKeys extends MainRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/add-user-keys';
    }

    public function __construct() {}
}
