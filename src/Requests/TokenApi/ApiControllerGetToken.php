<?php

namespace Gathern\CasdoorAPI\Requests\TokenApi;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ApiController.GetToken
 *
 * get token
 */
class ApiControllerGetToken extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/get-token";
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
