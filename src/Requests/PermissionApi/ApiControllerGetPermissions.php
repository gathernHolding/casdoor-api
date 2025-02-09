<?php

namespace Gathern\CasdoorAPI\Requests\PermissionApi;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ApiController.GetPermissions
 *
 * get permissions
 */
class ApiControllerGetPermissions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/get-permissions';
    }

    /**
     * @param  mixed  $owner  The owner of permissions
     */
    public function __construct(
        protected mixed $owner,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['owner' => $this->owner]);
    }
}
