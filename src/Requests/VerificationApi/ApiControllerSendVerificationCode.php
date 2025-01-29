<?php

namespace Gathern\CasdoorAPI\Requests\VerificationApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasMultipartBody;

/**
 * ApiController.SendVerificationCode
 */
class ApiControllerSendVerificationCode extends MainRequest implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/send-verification-code';
    }

    public function __construct(
        public string $dest,
        public string $applicationId,
        public string $type = 'phone',
        public string $captchaType = 'none',
        public ?string $optMethod = null,
        public ?string $countryCode = null,
        public ?bool $checkUser = null
    ) {}

    /**
     * Default body
     *
     * @return  MultipartValue[]
     */
    protected function defaultBody(): array
    {
        $data = [
            'dest' => $this->dest,
            'applicationId' => $this->applicationId,
            'type' => $this->type,
            'captchaType' => $this->captchaType,
            'method' => $this->optMethod,
            'countryCode' => $this->countryCode,
            'checkUser' => $this->checkUser,
        ];

        return array_map(
            callback:fn ($key): MultipartValue => new MultipartValue(name: $key, value:(string) $data[$key]),
             array:array_keys(array_filter($data))
            );
    }
}
