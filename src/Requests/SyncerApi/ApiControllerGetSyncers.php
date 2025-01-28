<?php

namespace Gathern\CasdoorAPI\Requests\SyncerApi;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ApiController.GetSyncers
 *
 * get syncers
 */
class ApiControllerGetSyncers extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/get-syncers";
	}


	/**
	 * @param mixed $owner The owner of syncers
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
