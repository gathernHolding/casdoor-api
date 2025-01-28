<?php

namespace Gathern\CasdoorAPI\Requests\SyncerApi;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ApiController.RunSyncer
 *
 * run syncer
 */
class ApiControllerRunSyncer extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/run-syncer";
	}


	public function __construct()
	{
	}
}
