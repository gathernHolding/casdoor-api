<?php

namespace Gathern\CasdoorAPI\Requests\VerificationApi;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.VerifyCaptcha
 */
class ApiControllerVerifyCaptcha extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/verify-captcha";
	}


	public function __construct()
	{
	}
}
