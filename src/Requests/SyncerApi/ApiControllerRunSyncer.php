<?php

namespace Gathern\CasdoorAPI\Requests\SyncerApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Enums\Method;

/**
 * ApiController.RunSyncer
 *
 * run syncer
 */
class ApiControllerRunSyncer extends MainRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/run-syncer';
    }

    public function __construct() {}
}
