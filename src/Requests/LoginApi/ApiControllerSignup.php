<?php

namespace Gathern\CasdoorAPI\Requests\LoginApi;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.Signup
 *
 * sign up a new user
 */
class ApiControllerSignup extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/signup";
	}


	public function __construct()
	{
	}
}
