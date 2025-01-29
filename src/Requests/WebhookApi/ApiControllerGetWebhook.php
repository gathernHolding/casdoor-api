<?php

namespace Gathern\CasdoorAPI\Requests\WebhookApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Enums\Method;

/**
 * ApiController.GetWebhook
 *
 * get webhook
 */
class ApiControllerGetWebhook extends MainRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/get-webhook';
    }

    /**
     * @param  mixed  $id  The id ( owner/name ) of the webhook
     */
    public function __construct(
        protected mixed $id,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['id' => $this->id]);
    }
}
