<?php

namespace Gathern\CasdoorAPI\Requests\LoginApi;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.Unlink
 */
class ApiControllerUnlink extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/unlink";
	}


	public function __construct()
	{
	}
}
