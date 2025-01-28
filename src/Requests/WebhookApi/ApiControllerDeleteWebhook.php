<?php

namespace Gathern\CasdoorAPI\Requests\WebhookApi;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.DeleteWebhook
 *
 * delete webhook
 */
class ApiControllerDeleteWebhook extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/delete-webhook";
	}


	public function __construct()
	{
	}
}
