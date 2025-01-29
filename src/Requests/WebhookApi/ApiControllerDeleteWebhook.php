<?php

namespace Gathern\CasdoorAPI\Requests\WebhookApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.DeleteWebhook
 *
 * delete webhook
 */
class ApiControllerDeleteWebhook extends MainRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/delete-webhook';
    }

    public function __construct() {}
}
