<?php

namespace Gathern\CasdoorAPI\Requests\GroupApi;

use Gathern\CasdoorAPI\DTO\Response\GroupData;
use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Enums\Method;

/**
 * ApiController.GetGroup
 *
 * get group
 */
class ApiControllerGetGroup extends MainRequest
{
    protected ?string $dataClassName = GroupData::class;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/get-group';
    }

    /**
     * @param  string  $id  The id ( owner/name ) of the group
     */
    public function __construct(
        protected readonly string $id,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['id' => $this->createCasdoorId($this->id)]);
    }
}
