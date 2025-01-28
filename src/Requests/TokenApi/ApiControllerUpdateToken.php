<?php

namespace Gathern\CasdoorAPI\Requests\TokenApi;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.UpdateToken
 *
 * update token
 */
class ApiControllerUpdateToken extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/update-token";
	}


	/**
	 * @param mixed $id The id ( owner/name ) of token
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
