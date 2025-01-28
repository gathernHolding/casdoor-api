<?php

namespace Gathern\CasdoorAPI\Requests\LoginApi;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ApiController.GetApplicationLogin
 *
 * get application login
 */
class ApiControllerGetApplicationLogin extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/get-app-login";
	}


	/**
	 * @param mixed $clientId client id
	 * @param mixed $responseType response type
	 * @param mixed $redirectUri redirect uri
	 * @param mixed $scope scope
	 * @param mixed $state state
	 */
	public function __construct(
		protected mixed $clientId,
		protected mixed $responseType,
		protected mixed $redirectUri,
		protected mixed $scope,
		protected mixed $state,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'clientId' => $this->clientId,
			'responseType' => $this->responseType,
			'redirectUri' => $this->redirectUri,
			'scope' => $this->scope,
			'state' => $this->state,
		]);
	}
}
