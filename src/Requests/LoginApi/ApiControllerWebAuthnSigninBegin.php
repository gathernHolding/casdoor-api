<?php

namespace Gathern\CasdoorAPI\Requests\LoginApi;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ApiController.WebAuthnSigninBegin
 *
 * WebAuthn Login Flow 1st stage
 */
class ApiControllerWebAuthnSigninBegin extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/webauthn/signin/begin";
	}


	/**
	 * @param mixed $owner owner
	 * @param mixed $name name
	 */
	public function __construct(
		protected mixed $owner,
		protected mixed $name,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['owner' => $this->owner, 'name' => $this->name]);
	}
}
