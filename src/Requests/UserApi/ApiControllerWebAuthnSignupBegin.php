<?php

namespace Gathern\CasdoorAPI\Requests\UserApi;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ApiController.WebAuthnSignupBegin
 *
 * WebAuthn Registration Flow 1st stage
 */
class ApiControllerWebAuthnSignupBegin extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/webauthn/signup/begin";
	}


	public function __construct()
	{
	}
}
