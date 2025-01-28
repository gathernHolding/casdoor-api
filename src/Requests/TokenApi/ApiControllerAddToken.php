<?php

namespace Gathern\CasdoorAPI\Requests\TokenApi;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.AddToken
 *
 * add token
 */
class ApiControllerAddToken extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/add-token";
	}


	public function __construct()
	{
	}
}
