<?php

namespace Gathern\CasdoorAPI\Requests\SyncerApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Enums\Method;

/**
 * ApiController.GetSyncers
 *
 * get syncers
 */
class ApiControllerGetSyncers extends MainRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/get-syncers';
    }

    /**
     * @param  mixed  $owner  The owner of syncers
     */
    public function __construct(
        protected mixed $owner,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['owner' => $this->owner]);
    }
}
