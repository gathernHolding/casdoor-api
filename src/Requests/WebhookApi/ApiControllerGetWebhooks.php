<?php

namespace Gathern\CasdoorAPI\Requests\WebhookApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Enums\Method;

/**
 * ApiController.GetWebhooks
 *
 * get webhooks
 */
class ApiControllerGetWebhooks extends MainRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/get-webhooks';
    }

    /**
     * @param  mixed  $owner  The owner of webhooks
     */
    public function __construct(
        protected mixed $owner,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['owner' => $this->owner]);
    }
}
