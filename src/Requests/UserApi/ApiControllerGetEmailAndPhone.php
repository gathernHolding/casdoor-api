<?php

namespace Gathern\CasdoorAPI\Requests\UserApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Enums\Method;

/**
 * ApiController.GetEmailAndPhone
 *
 * get email and phone by username
 */
class ApiControllerGetEmailAndPhone extends MainRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/get-email-and-phone';
    }

    public function __construct() {}
}
