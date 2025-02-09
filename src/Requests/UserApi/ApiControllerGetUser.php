<?php

namespace Gathern\CasdoorAPI\Requests\UserApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Enums\Method;

/**
 * ApiController.GetUser
 *
 * get user
 */
class ApiControllerGetUser extends MainRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/get-user';
    }

    public function __construct(
        protected string $id,
        protected ?string $owner = null,
        protected ?string $email = null,
        protected ?string $phone = null,
        protected ?string $userId = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'id' => $this->createCasdoorId($this->id),
            'owner' => $this->owner,
            'email' => $this->email,
            'phone' => $this->phone,
            'userId' => $this->userId,
        ]);
    }
}
