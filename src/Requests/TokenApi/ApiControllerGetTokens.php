<?php

namespace Gathern\CasdoorAPI\Requests\TokenApi;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ApiController.GetTokens
 *
 * get tokens
 */
class ApiControllerGetTokens extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/get-tokens";
	}


	/**
	 * @param mixed $owner The owner of tokens
	 * @param mixed $pageSize The size of each page
	 * @param mixed $p The number of the page
	 */
	public function __construct(
		protected mixed $owner,
		protected mixed $pageSize,
		protected mixed $p,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['owner' => $this->owner, 'pageSize' => $this->pageSize, 'p' => $this->p]);
	}
}
