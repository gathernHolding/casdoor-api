<?php

namespace Gathern\CasdoorAPI\Requests\UserApi;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ApiController.GetEmailAndPhone
 *
 * get email and phone by username
 */
class ApiControllerGetEmailAndPhone extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/get-email-and-phone";
	}


	public function __construct()
	{
	}
}
