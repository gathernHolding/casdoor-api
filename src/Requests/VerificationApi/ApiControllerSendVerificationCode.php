<?php

namespace Gathern\CasdoorAPI\Requests\VerificationApi;

use DateTime;
use Pest\Support\Str;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.SendVerificationCode
 */
class ApiControllerSendVerificationCode extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/send-verification-code";
    }

    public function __construct(
        public string $dest,
        public string $applicationId,
        public string $type = "phone",
        public string $captchaType = "none",
        public ?string $optMethod = null,
        public ?string $countryCode = null,
        public ?bool $checkUser = null
    ) {}

    /**
     * Default body
     *
     * @return array<string, mixed>
     */
    protected function defaultBody(): array
    {
        return [
            "dest" => $this->dest,
            "applicationId" => $this->applicationId,
            "type" => $this->type,
            "captchaType" => $this->captchaType,
            "method" => $this->optMethod,
            "countryCode" => $this->countryCode,
            "checkUser" => $this->checkUser,
        ];
    }
}
