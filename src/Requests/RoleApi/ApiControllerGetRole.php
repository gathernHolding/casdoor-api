<?php

namespace Gathern\CasdoorAPI\Requests\RoleApi;

use Gathern\CasdoorAPI\DTO\Response\RoleData;
use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Enums\Method;

/**
 * ApiController.GetRole
 *
 * get role
 *
 * @extends MainRequest<RoleData>
 */
class ApiControllerGetRole extends MainRequest
{
    protected Method $method = Method::GET;

    protected ?string $dataClassName = RoleData::class;

    public function resolveEndpoint(): string
    {
        return '/api/get-role';
    }

    /**
     * @param  string  $id  The id ( owner/name ) of the role
     */
    public function __construct(
        protected string $id,
    ) {}

    /**
     * @return array<string,mixed>
     */
    public function defaultQuery(): array
    {
        return array_filter(['id' => $this->createCasdoorId($this->id)]);
    }
}
