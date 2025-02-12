<?php

namespace Gathern\CasdoorAPI\Requests\PermissionApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Enums\Method;

/**
 * ApiController.GetPermissionsByRole
 *
 * get permissions by role
 */
class ApiControllerGetPermissionsByRole extends MainRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/get-permissions-by-role';
    }

    /**
     * @param  string  $id  The id ( owner/name ) of the role
     */
    public function __construct(
        protected string $id,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['id' => $this->id]);
    }
}
