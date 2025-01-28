<?php

namespace Gathern\CasdoorAPI\Requests\UserApi;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.CheckUserPassword
 */
class ApiControllerCheckUserPassword extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/check-user-password";
	}


	public function __construct()
	{
	}
}
