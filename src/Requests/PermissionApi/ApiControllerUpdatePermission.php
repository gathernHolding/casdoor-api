<?php

namespace Gathern\CasdoorAPI\Requests\PermissionApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.UpdatePermission
 *
 * update permission
 */
class ApiControllerUpdatePermission extends MainRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/update-permission';
    }

    /**
     * @param  string  $id  The id ( owner/name ) of the permission
     */
    public function __construct(
        protected string $id,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['id' => $this->id]);
    }
}
