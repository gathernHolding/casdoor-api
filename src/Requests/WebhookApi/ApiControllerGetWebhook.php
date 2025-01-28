<?php

namespace Gathern\CasdoorAPI\Requests\WebhookApi;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ApiController.GetWebhook
 *
 * get webhook
 */
class ApiControllerGetWebhook extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/get-webhook";
	}


	/**
	 * @param mixed $id The id ( owner/name ) of the webhook
	 */
	public function __construct(
		protected mixed $id,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['id' => $this->id]);
	}
}
