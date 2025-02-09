<?php

namespace Gathern\CasdoorAPI\Requests\PermissionApi;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ApiController.GetPermissionsByRole
 *
 * get permissions by role
 */
class ApiControllerGetPermissionsByRole extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/get-permissions-by-role';
    }

    /**
     * @param  mixed  $id  The id ( owner/name ) of the role
     */
    public function __construct(
        protected mixed $id,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['id' => $this->id]);
    }
}
