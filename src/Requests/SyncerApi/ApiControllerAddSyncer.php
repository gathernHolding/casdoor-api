<?php

namespace Gathern\CasdoorAPI\Requests\SyncerApi;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.AddSyncer
 *
 * add syncer
 */
class ApiControllerAddSyncer extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/add-syncer";
	}


	public function __construct()
	{
	}
}
