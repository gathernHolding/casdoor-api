<?php

namespace Gathern\CasdoorAPI\Requests\SyncerApi;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.UpdateSyncer
 *
 * update syncer
 */
class ApiControllerUpdateSyncer extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/update-syncer";
	}


	/**
	 * @param mixed $id The id ( owner/name ) of the syncer
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
