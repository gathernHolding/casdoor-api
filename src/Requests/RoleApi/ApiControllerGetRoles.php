<?php

namespace Gathern\CasdoorAPI\Requests\RoleApi;

use Gathern\CasdoorAPI\DTO\Response\RoleData;
use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Enums\Method;

/**
 * ApiController.GetRoles
 *
 * get roles
 */
class ApiControllerGetRoles extends MainRequest
{
    protected Method $method = Method::GET;

    protected ?string $dataClassName = RoleData::class;

    protected bool $isCollectionData = true;

    public function resolveEndpoint(): string
    {
        return '/api/get-roles';
    }

    /**
     * @param  null|string  $owner  The owner of roles
     */
    public function __construct(
        protected ?string $owner = null,
    ) {}

    /**
     * Summary of defaultQuery
     *
     * @return array<string,mixed>
     */
    public function defaultQuery(): array
    {
        return array_filter(['owner' => $this->owner ?? getenv('AUTH_ORGANIZATION_NAME')]);
    }
}
