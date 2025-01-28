<?php

namespace Gathern\CasdoorAPI\Requests\LoginApi;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ApiController.GetCaptcha
 */
class ApiControllerGetCaptcha extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/get-captcha";
	}


	public function __construct()
	{
	}
}
