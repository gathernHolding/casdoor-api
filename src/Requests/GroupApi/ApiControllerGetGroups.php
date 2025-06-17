<?php

namespace Gathern\CasdoorAPI\Requests\GroupApi;

use Gathern\CasdoorAPI\DTO\Response\GroupData;
use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Enums\Method;

/**
 * ApiController.GetGroups
 *
 * get groups
 */
class ApiControllerGetGroups extends MainRequest
{
    protected Method $method = Method::GET;

    protected ?string $dataClassName = GroupData::class;

    protected bool $isCollectionData = true;

    public function resolveEndpoint(): string
    {
        return '/api/get-groups';
    }

    /**
     * @param  string  $owner  The owner of groups
     */
    public function __construct(
        protected ?string $owner,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['owner' => $this->owner ?? getenv('AUTH_ORGANIZATION_NAME')]);
    }
}
