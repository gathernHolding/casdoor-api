<?php

namespace Gathern\CasdoorAPI\Requests\UserApi;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ApiController.GetUserCount
 */
class ApiControllerGetUserCount extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/get-user-count";
	}


	/**
	 * @param mixed $owner The owner of users
	 * @param mixed $isOnline The filter for query, 1 for online, 0 for offline, empty string for all users
	 */
	public function __construct(
		protected mixed $owner,
		protected mixed $isOnline,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['owner' => $this->owner, 'isOnline' => $this->isOnline]);
	}
}
