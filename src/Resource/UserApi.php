<?php

namespace Gathern\CasdoorAPI\Resource;

use Gathern\CasdoorAPI\Requests\UserApi\ApiControllerAddUser;
use Gathern\CasdoorAPI\Requests\UserApi\ApiControllerAddUserKeys;
use Gathern\CasdoorAPI\Requests\UserApi\ApiControllerCheckUserPassword;
use Gathern\CasdoorAPI\Requests\UserApi\ApiControllerDeleteUser;
use Gathern\CasdoorAPI\Requests\UserApi\ApiControllerGetEmailAndPhone;
use Gathern\CasdoorAPI\Requests\UserApi\ApiControllerGetGlobalUsers;
use Gathern\CasdoorAPI\Requests\UserApi\ApiControllerGetSortedUsers;
use Gathern\CasdoorAPI\Requests\UserApi\ApiControllerGetUser;
use Gathern\CasdoorAPI\Requests\UserApi\ApiControllerGetUserCount;
use Gathern\CasdoorAPI\Requests\UserApi\ApiControllerGetUsers;
use Gathern\CasdoorAPI\Requests\UserApi\ApiControllerUpdateUser;
use Gathern\CasdoorAPI\Requests\UserApi\ApiControllerWebAuthnSignupBegin;
use Gathern\CasdoorAPI\Requests\UserApi\ApiControllerWebAuthnSignupFinish;
use Gathern\CasdoorAPI\Resource;
use Saloon\Http\Response;

class UserApi extends Resource
{
    public function apiControllerAddUser(): Response
    {
        return $this->connector->send(new ApiControllerAddUser);
    }

    public function apiControllerAddUserKeys(): Response
    {
        return $this->connector->send(new ApiControllerAddUserKeys);
    }

    public function apiControllerCheckUserPassword(): Response
    {
        return $this->connector->send(new ApiControllerCheckUserPassword);
    }

    public function apiControllerDeleteUser(): Response
    {
        return $this->connector->send(new ApiControllerDeleteUser);
    }

    public function apiControllerGetEmailAndPhone(): Response
    {
        return $this->connector->send(new ApiControllerGetEmailAndPhone);
    }

    public function apiControllerGetGlobalUsers(): Response
    {
        return $this->connector->send(new ApiControllerGetGlobalUsers);
    }

    /**
     * @param  mixed  $owner  The owner of users
     * @param  mixed  $sorter  The DB column name to sort by, e.g., created_time
     * @param  mixed  $limit  The count of users to return, e.g., 25
     */
    public function apiControllerGetSortedUsers(mixed $owner, mixed $sorter, mixed $limit): Response
    {
        return $this->connector->send(new ApiControllerGetSortedUsers($owner, $sorter, $limit));
    }

    /**
     * @param  mixed  $id  The id ( owner/name ) of the user
     * @param  mixed  $owner  The owner of the user
     * @param  mixed  $email  The email of the user
     * @param  mixed  $phone  The phone of the user
     * @param  mixed  $userId  The userId of the user
     */
    public function apiControllerGetUser(mixed $id, mixed $owner, mixed $email, mixed $phone, mixed $userId): Response
    {
        return $this->connector->send(new ApiControllerGetUser($id, $owner, $email, $phone, $userId));
    }

    /**
     * @param  mixed  $owner  The owner of users
     * @param  mixed  $isOnline  The filter for query, 1 for online, 0 for offline, empty string for all users
     */
    public function apiControllerGetUserCount(mixed $owner, mixed $isOnline): Response
    {
        return $this->connector->send(new ApiControllerGetUserCount($owner, $isOnline));
    }

    /**
     * @param  mixed  $owner  The owner of users
     */
    public function apiControllerGetUsers(mixed $owner): Response
    {
        return $this->connector->send(new ApiControllerGetUsers($owner));
    }

    /**
     * @param  mixed  $id  The id ( owner/name ) of the user
     */
    public function apiControllerUpdateUser(mixed $id): Response
    {
        return $this->connector->send(new ApiControllerUpdateUser($id));
    }

    public function apiControllerWebAuthnSignupBegin(): Response
    {
        return $this->connector->send(new ApiControllerWebAuthnSignupBegin);
    }

    public function apiControllerWebAuthnSignupFinish(): Response
    {
        return $this->connector->send(new ApiControllerWebAuthnSignupFinish);
    }
}
