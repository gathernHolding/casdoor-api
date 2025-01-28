<?php

namespace Gathern\CasdoorAPI\Requests\WebhookApi;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ApiController.GetWebhooks
 *
 * get webhooks
 */
class ApiControllerGetWebhooks extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/get-webhooks";
	}


	/**
	 * @param mixed $owner The owner of webhooks
	 */
	public function __construct(
		protected mixed $owner,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['owner' => $this->owner]);
	}
}
