<?php

namespace Gathern\CasdoorAPI\Requests\UserApi;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.WebAuthnSignupFinish
 *
 * WebAuthn Registration Flow 2nd stage
 */
class ApiControllerWebAuthnSignupFinish extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/webauthn/signup/finish";
	}


	public function __construct()
	{
	}
}
