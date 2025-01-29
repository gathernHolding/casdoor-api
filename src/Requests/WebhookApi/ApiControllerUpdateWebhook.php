<?php

namespace Gathern\CasdoorAPI\Requests\WebhookApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.UpdateWebhook
 *
 * update webhook
 */
class ApiControllerUpdateWebhook extends MainRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/update-webhook';
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
