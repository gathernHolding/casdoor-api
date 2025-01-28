<?php

namespace Gathern\CasdoorAPI\Requests\VerificationApi;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.VerifyCode
 */
class ApiControllerVerifyCode extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/verify-code";
	}


	public function __construct()
	{
	}
}
