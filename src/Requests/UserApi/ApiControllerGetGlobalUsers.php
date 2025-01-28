<?php

namespace Gathern\CasdoorAPI\Requests\UserApi;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ApiController.GetGlobalUsers
 *
 * get global users
 */
class ApiControllerGetGlobalUsers extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/get-global-users";
	}


	public function __construct()
	{
	}
}
