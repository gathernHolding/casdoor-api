<?php

namespace Gathern\CasdoorAPI\Requests\UserApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasMultipartBody;

/**
 * ApiController.CheckUserPassword
 */
class ApiControllerSetUserPassword extends MainRequest implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/set-password';
    }

    /**
     * Default body
     *
     * @return array<string, mixed>
     */

    /**
     * Default body
     *
     * @return MultipartValue[]
     */
    protected function defaultBody(): array
    {
        $data = [
            'userName' => $this->userName,
            'newPassword' => $this->newPassword,
            'userOwner' => $this->userOwner,
            'oldPassword' => $this->oldPassword,
        ];

        return array_map(
            callback: fn ($key): MultipartValue => new MultipartValue(name: $key, value: (string) $data[$key]),
            array: array_keys(array_filter($data))
        );
    }

    public function __construct(
        public readonly string $userName,
        public readonly string $newPassword,
        public readonly string $userOwner,
        public readonly ?string $oldPassword = null,

    ) {}
}
