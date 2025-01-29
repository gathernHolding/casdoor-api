<?php

namespace Gathern\CasdoorAPI\Requests\SyncerApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.DeleteSyncer
 *
 * delete syncer
 */
class ApiControllerDeleteSyncer extends MainRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/delete-syncer';
    }

    public function __construct() {}
}
