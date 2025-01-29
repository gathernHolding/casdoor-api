<?php

namespace Gathern\CasdoorAPI\Requests\VerificationApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.VerifyCaptcha
 */
class ApiControllerVerifyCaptcha extends MainRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/verify-captcha';
    }

    public function __construct() {}
}
