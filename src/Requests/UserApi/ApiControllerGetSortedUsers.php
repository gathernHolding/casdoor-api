<?php

namespace Gathern\CasdoorAPI\Requests\UserApi;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ApiController.GetSortedUsers
 */
class ApiControllerGetSortedUsers extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/get-sorted-users";
	}


	/**
	 * @param mixed $owner The owner of users
	 * @param mixed $sorter The DB column name to sort by, e.g., created_time
	 * @param mixed $limit The count of users to return, e.g., 25
	 */
	public function __construct(
		protected mixed $owner,
		protected mixed $sorter,
		protected mixed $limit,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['owner' => $this->owner, 'sorter' => $this->sorter, 'limit' => $this->limit]);
	}
}
