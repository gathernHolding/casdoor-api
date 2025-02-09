<?php

declare(strict_types=1);

namespace Gathern\CasdoorAPI\Resource;

use DateTime;
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
    /**
     * Summary of apiControllerAddUser
     *
     * @param  string[]  $address
     * @param  string[]  $roles
     * @param  array<string,string>  $properties
     * @param  string[]  $managedAccounts
     */
    public function apiControllerAddUser(
        string $name,
        ?string $email = null,
        ?string $phone = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $displayName = null,
        ?string $countryCode = '+966',
        ?string $language = null,
        ?array $address = [],
        ?string $birthday = null,
        ?string $gender = null,
        ?string $bio = null,
        ?array $roles = [],
        ?array $properties = [],
        ?DateTime $createdTime = new DateTime('now'),
        ?string $owner = null,
        ?array $managedAccounts = null,
        ?int $ranking = null,
        ?string $region = null,
    ): Response {
        return $this->connector->send(new ApiControllerAddUser(
            name: $name,
            address: $address,
            bio: $bio,
            birthday: $birthday,
            countryCode: $countryCode,
            createdTime: $createdTime,
            displayName: $displayName,
            email: $email,
            firstName: $firstName,
            gender: $gender,
            language: $language,
            lastName: $lastName,
            managedAccounts: $managedAccounts,
            owner: $owner,
            phone: $phone,
            properties: $properties,
            ranking: $ranking,
            region: $region,
            roles: $roles
        ));
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
     * @param  string  $id  The id ( owner/name ) of the user
     * @param  string  $owner  The owner of the user
     * @param  string  $email  The email of the user
     * @param  string  $phone  The phone of the user
     * @param  string  $userId  The userId of the user
     */
    public function apiControllerGetUser(string $id, string $owner, string $email, string $phone, string $userId): Response
    {
        return $this->connector->send(new ApiControllerGetUser($id, $owner, $email, $phone, $userId));
    }

    public function apiControllerGetUserCount(string $owner, bool $isOnline): Response
    {
        return $this->connector->send(new ApiControllerGetUserCount($owner, $isOnline));
    }

    public function apiControllerGetUsers(string $owner): Response
    {
        return $this->connector->send(new ApiControllerGetUsers($owner));
    }

    /**
     * @param  string  $id  The id ( owner/name ) of the user
     */
    public function apiControllerUpdateUser(string $id): Response
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
