<?php

namespace Gathern\CasdoorAPI\Requests\TokenApi;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ApiController.GetCaptchaStatus
 *
 * Get Login Error Counts
 */
class ApiControllerGetCaptchaStatus extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/get-captcha-status";
	}


	/**
	 * @param mixed $id The id ( owner/name ) of user
	 */
	public function __construct(
		protected mixed $id,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['id' => $this->id]);
	}
}
