<?php

namespace Gathern\CasdoorAPI\Requests\UserApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Enums\Method;

/**
 * ApiController.GetUsers
 */
class ApiControllerGetUsers extends MainRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/get-users';
    }

    /**
     * @param  mixed  $owner  The owner of users
     */
    public function __construct(
        protected mixed $owner,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['owner' => $this->owner]);
    }
}
