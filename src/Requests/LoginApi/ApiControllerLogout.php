<?php

namespace Gathern\CasdoorAPI\Requests\LoginApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Enums\Method;

/**
 * ApiController.Logout
 *
 * logout the current user
 */
class ApiControllerLogout extends MainRequest
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/logout';
    }

    public function __construct(
        protected ?string $token,
        protected ?string $postLogoutRedirectUri = null,
        protected ?string $state = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'id_token_hint' => $this->token,
            'post_logout_redirect_uri' => $this->postLogoutRedirectUri,
            'state' => $this->state,
        ]);
    }
}
