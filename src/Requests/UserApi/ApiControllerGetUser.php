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

    /**
     * @param  null|mixed  $id  The id ( owner/name ) of the user
     * @param  null|mixed  $owner  The owner of the user
     * @param  null|mixed  $email  The email of the user
     * @param  null|mixed  $phone  The phone of the user
     * @param  null|mixed  $userId  The userId of the user
     */
    public function __construct(
        protected mixed $id = null,
        protected mixed $owner = null,
        protected mixed $email = null,
        protected mixed $phone = null,
        protected mixed $userId = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'id' => $this->id,
            'owner' => $this->owner,
            'email' => $this->email,
            'phone' => $this->phone,
            'userId' => $this->userId,
        ]);
    }
}
