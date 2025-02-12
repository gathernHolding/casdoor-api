<?php

declare(strict_types=1);

namespace Gathern\CasdoorAPI\Resource;

use DateTime;
use Gathern\CasdoorAPI\DTO\Response\RoleData;
use Gathern\CasdoorAPI\Requests\RoleApi\ApiControllerAddRole;
use Gathern\CasdoorAPI\Requests\RoleApi\ApiControllerDeleteRole;
use Gathern\CasdoorAPI\Requests\RoleApi\ApiControllerGetRole;
use Gathern\CasdoorAPI\Requests\RoleApi\ApiControllerGetRoles;
use Gathern\CasdoorAPI\Requests\RoleApi\ApiControllerUpdateRole;
use Gathern\CasdoorAPI\Resource;
use Saloon\Http\Response;

class RoleApi extends Resource
{
    /**
     * @param  string[]  $users
     * @param  string[]  $groups
     * @param  string[]  $roles
     * @param  string[]  $domains
     */
    public function apiControllerAddRole(
        string $displayName,
        string $name,
        ?string $owner = null,
        ?DateTime $createdTime = null,
        array $users = [],
        array $groups = [],
        array $roles = [],
        array $domains = [],
        bool $isEnabled = true
    ): Response {
        return $this->connector->send(new ApiControllerAddRole(
            displayName: $displayName,
            name: $name,
            owner: (string) ($owner !== null && $owner !== '' && $owner !== '0' ? $owner : getenv('AUTH_ORGANIZATION_NAME')),
            createdTime: $createdTime,
            users: $users,
            groups: $groups,
            roles: $roles,
            domains: $domains,
            isEnabled: $isEnabled
        ));
    }

    public function apiControllerDeleteRole(string $displayName, string $name): Response
    {
        return $this->connector->send(new ApiControllerDeleteRole(displayName: $displayName, name: $name));
    }

    /**
     * @param  string  $id  The id ( owner/name ) of the role
     */
    public function apiControllerGetRole(string $id): Response
    {
        return $this->connector->send(new ApiControllerGetRole($id));
    }

    /**
     * @param  string|null  $owner  The owner of roles
     */
    public function apiControllerGetRoles(?string $owner = null): Response
    {
        return $this->connector->send(new ApiControllerGetRoles(
            owner: (string) ($owner ?? getenv('AUTH_ORGANIZATION_NAME')
            )
        ));
    }

    /**
     * @param  string[]  $users
     * @param  string[]  $groups
     * @param  string[]  $roles
     * @param  string[]  $domains
     */
    public function apiControllerUpdateRole(
        string $id,
        string $displayName,
        string $name,
        ?string $owner = null,
        ?DateTime $createdTime = null,
        array $users = [],
        array $groups = [],
        array $roles = [],
        array $domains = [],
        bool $isEnabled = true
    ): Response {
        return $this->connector->send(new ApiControllerUpdateRole(
            id: $id,
            displayName: $displayName,
            name: $name,
            owner: (string) ($owner ?? getenv('AUTH_ORGANIZATION_NAME')),
            createdTime: $createdTime,
            users: $users,
            groups: $groups,
            roles: $roles,
            domains: $domains,
            isEnabled: $isEnabled
        ));
    }

    /**
     * @param  string[]  $users
     * @param  string[]  $groups
     * @param  string[]  $roles
     * @param  string[]  $domains
     */
    public function apiControllerUpdateRoleFromRoleData(
        RoleData $roleData,
        ?string $displayName = null,
        ?string $name = null,
        ?string $owner = null,
        ?DateTime $createdTime = null,
        ?array $users = null,
        ?array $groups = null,
        ?array $roles = null,
        ?array $domains = null,
        bool $isEnabled = true
    ): Response {
        return $this->connector->send(new ApiControllerUpdateRole(
            id: $roleData->name,
            displayName: $displayName ?? $roleData->displayName,
            name: $name ?? $roleData->name,
            owner: $owner ?? $roleData->owner,
            createdTime: $createdTime ?? new DateTime($roleData->createdTime ?? 'now'),
            users: $users ?? $roleData->users ?? [],
            groups: $groups ?? $roleData->groups ?? [],
            roles: $roles ?? $roleData->roles ?? [],
            domains: $domains ?? $roleData->domains ?? [],
            isEnabled: $isEnabled
        ));
    }
}
