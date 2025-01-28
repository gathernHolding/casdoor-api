<?php

namespace Gathern\CasdoorAPI\Requests\TokenApi;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.RefreshToken
 *
 * refresh OAuth access token
 */
class ApiControllerRefreshToken extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/login/oauth/refresh_token";
	}


	/**
	 * @param mixed $grantType OAuth grant type
	 * @param mixed $refreshToken OAuth refresh token
	 * @param mixed $scope OAuth scope
	 * @param mixed $clientId OAuth client id
	 * @param null|mixed $clientSecret OAuth client secret
	 */
	public function __construct(
		protected mixed $grantType,
		protected mixed $refreshToken,
		protected mixed $scope,
		protected mixed $clientId,
		protected mixed $clientSecret = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'grant_type' => $this->grantType,
			'refresh_token' => $this->refreshToken,
			'scope' => $this->scope,
			'client_id' => $this->clientId,
			'client_secret' => $this->clientSecret,
		]);
	}
}
