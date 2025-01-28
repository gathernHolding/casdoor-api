<?php

namespace Gathern\CasdoorAPI\Resource;

use Gathern\CasdoorAPI\Requests\WebhookApi\ApiControllerAddWebhook;
use Gathern\CasdoorAPI\Requests\WebhookApi\ApiControllerDeleteWebhook;
use Gathern\CasdoorAPI\Requests\WebhookApi\ApiControllerGetWebhook;
use Gathern\CasdoorAPI\Requests\WebhookApi\ApiControllerGetWebhooks;
use Gathern\CasdoorAPI\Requests\WebhookApi\ApiControllerUpdateWebhook;
use Gathern\CasdoorAPI\Resource;
use Saloon\Http\Response;

class WebhookApi extends Resource
{
	public function apiControllerAddWebhook(): Response
	{
		return $this->connector->send(new ApiControllerAddWebhook());
	}


	public function apiControllerDeleteWebhook(): Response
	{
		return $this->connector->send(new ApiControllerDeleteWebhook());
	}


	/**
	 * @param mixed $id The id ( owner/name ) of the webhook
	 */
	public function apiControllerGetWebhook(mixed $id): Response
	{
		return $this->connector->send(new ApiControllerGetWebhook($id));
	}


	/**
	 * @param mixed $owner The owner of webhooks
	 */
	public function apiControllerGetWebhooks(mixed $owner): Response
	{
		return $this->connector->send(new ApiControllerGetWebhooks($owner));
	}


	/**
	 * @param mixed $id The id ( owner/name ) of the webhook
	 */
	public function apiControllerUpdateWebhook(mixed $id): Response
	{
		return $this->connector->send(new ApiControllerUpdateWebhook($id));
	}
}
