<?php

namespace Gathern\CasdoorAPI\Requests\WebhookApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.AddWebhook
 *
 * add webhook
 */
class ApiControllerAddWebhook extends MainRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/add-webhook';
    }

    public function __construct() {}
}
