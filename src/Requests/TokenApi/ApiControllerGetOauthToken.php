<?php

namespace Gathern\CasdoorAPI\Requests\TokenApi;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.GetOAuthToken
 *
 * get OAuth access token
 */
class ApiControllerGetOauthToken extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/login/oauth/access_token";
	}


	/**
	 * @param mixed $grantType OAuth grant type
	 * @param mixed $clientId OAuth client id
	 * @param mixed $clientSecret OAuth client secret
	 * @param mixed $code OAuth code
	 */
	public function __construct(
		protected mixed $grantType,
		protected mixed $clientId,
		protected mixed $clientSecret,
		protected mixed $code,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'grant_type' => $this->grantType,
			'client_id' => $this->clientId,
			'client_secret' => $this->clientSecret,
			'code' => $this->code,
		]);
	}
}
