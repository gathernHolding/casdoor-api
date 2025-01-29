<?php

namespace Gathern\CasdoorAPI\Resource;

use Gathern\CasdoorAPI\Requests\VerificationApi\ApiControllerSendVerificationCode;
use Gathern\CasdoorAPI\Requests\VerificationApi\ApiControllerVerifyCaptcha;
use Gathern\CasdoorAPI\Requests\VerificationApi\ApiControllerVerifyCode;
use Gathern\CasdoorAPI\Resource;
use Saloon\Http\Response;

class VerificationApi extends Resource
{
    public function apiControllerSendVerificationCode(
        string $dest,
        string $applicationId,
        string $type = 'phone',
        string $captchaType = 'none',
        ?string $optMethod = null,
        ?string $countryCode = null,
        ?bool $checkUser = null
    ): Response {
        return $this->connector->send(new ApiControllerSendVerificationCode(
            dest: $dest,
            applicationId: $applicationId,
            type: $type,
            captchaType: $captchaType,
            optMethod: $optMethod,
            countryCode: $countryCode,
            checkUser: $checkUser
        ));
    }

    public function apiControllerVerifyCaptcha(): Response
    {
        return $this->connector->send(new ApiControllerVerifyCaptcha);
    }

    public function apiControllerVerifyCode(): Response
    {
        return $this->connector->send(new ApiControllerVerifyCode);
    }
}
