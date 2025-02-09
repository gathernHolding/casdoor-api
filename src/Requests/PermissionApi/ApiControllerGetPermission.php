<?php

namespace Gathern\CasdoorAPI\Requests\PermissionApi;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ApiController.GetPermission
 *
 * get permission
 */
class ApiControllerGetPermission extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/get-permission';
    }

    /**
     * @param  mixed  $id  The id ( owner/name ) of the permission
     */
    public function __construct(
        protected mixed $id,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['id' => $this->id]);
    }
}
