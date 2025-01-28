<?php

namespace Gathern\CasdoorAPI\Requests\LoginApi;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.WebAuthnSigninFinish
 *
 * WebAuthn Login Flow 2nd stage
 */
class ApiControllerWebAuthnSigninFinish extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/webauthn/signin/finish";
	}


	public function __construct()
	{
	}
}
