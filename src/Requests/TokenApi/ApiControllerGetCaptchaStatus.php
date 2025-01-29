<?php

namespace Gathern\CasdoorAPI\Requests\TokenApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Enums\Method;

/**
 * ApiController.GetCaptchaStatus
 *
 * Get Login Error Counts
 */
class ApiControllerGetCaptchaStatus extends MainRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/get-captcha-status';
    }

    /**
     * @param  mixed  $id  The id ( owner/name ) of user
     */
    public function __construct(
        protected mixed $id,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['id' => $this->id]);
    }
}
