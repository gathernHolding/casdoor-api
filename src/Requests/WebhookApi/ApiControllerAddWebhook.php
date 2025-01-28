<?php

namespace Gathern\CasdoorAPI\Requests\WebhookApi;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.AddWebhook
 *
 * add webhook
 */
class ApiControllerAddWebhook extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/add-webhook";
	}


	public function __construct()
	{
	}
}
