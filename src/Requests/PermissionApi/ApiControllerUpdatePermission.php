<?php

namespace Gathern\CasdoorAPI\Requests\PermissionApi;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.UpdatePermission
 *
 * update permission
 */
class ApiControllerUpdatePermission extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/update-permission';
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
