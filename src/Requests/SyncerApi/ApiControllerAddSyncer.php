<?php

namespace Gathern\CasdoorAPI\Requests\SyncerApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.AddSyncer
 *
 * add syncer
 */
class ApiControllerAddSyncer extends MainRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/add-syncer';
    }

    public function __construct() {}
}
