<?php

namespace Gathern\CasdoorAPI\Requests\VerificationApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.VerifyCode
 */
class ApiControllerVerifyCode extends MainRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/verify-code';
    }

    public function __construct() {}
}
