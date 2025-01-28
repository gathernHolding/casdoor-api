<?php

namespace Gathern\CasdoorAPI\Requests\UserApi;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.AddUserKeys
 */
class ApiControllerAddUserKeys extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/add-user-keys";
	}


	public function __construct()
	{
	}
}
