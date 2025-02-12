<?php

namespace Gathern\CasdoorAPI\Requests\PermissionApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Enums\Method;

/**
 * ApiController.GetPermissions
 *
 * get permissions
 */
class ApiControllerGetPermissions extends MainRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/get-permissions';
    }

    /**
     * @param  string  $owner  The owner of permissions
     */
    public function __construct(
        protected string $owner,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['owner' => $this->owner]);
    }
}
