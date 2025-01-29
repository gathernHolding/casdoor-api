<?php

namespace Gathern\CasdoorAPI\Requests\LoginApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.Logout
 *
 * logout the current user
 */
class ApiControllerLogout extends MainRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/logout';
    }

    /**
     * @param  null|mixed  $idTokenHint  id_token_hint
     * @param  null|mixed  $postLogoutRedirectUri  post_logout_redirect_uri
     * @param  null|mixed  $state  state
     */
    public function __construct(
        protected mixed $idTokenHint = null,
        protected mixed $postLogoutRedirectUri = null,
        protected mixed $state = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'id_token_hint' => $this->idTokenHint,
            'post_logout_redirect_uri' => $this->postLogoutRedirectUri,
            'state' => $this->state,
        ]);
    }
}
