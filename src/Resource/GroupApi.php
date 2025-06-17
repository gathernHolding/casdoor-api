<?php

namespace Gathern\CasdoorAPI\Resource;

use Gathern\CasdoorAPI\Enum\GroupType;
use Gathern\CasdoorAPI\Requests\GroupApi\ApiControllerAddGroup;
use Gathern\CasdoorAPI\Requests\GroupApi\ApiControllerDeleteGroup;
use Gathern\CasdoorAPI\Requests\GroupApi\ApiControllerGetGroup;
use Gathern\CasdoorAPI\Requests\GroupApi\ApiControllerGetGroups;
use Gathern\CasdoorAPI\Requests\GroupApi\ApiControllerUpdateGroup;
use Gathern\CasdoorAPI\Resource;
use Saloon\Http\Response;

class GroupApi extends Resource
{
    /**
     * @param  string[]  $users
     */
    public function apiControllerAddGroup(
        string $name,
        ?string $owner = null,
        ?string $displayName = null,
        bool $isEnabled = true,
        bool $isTopGroup = true,
        ?string $parentId = null,
        GroupType $type = GroupType::VIRTUAL,
        array $users = [],
        ?string $createdTime = null,
        ?string $updatedTime = null,
    ): Response {
        return $this->connector->send(request: new ApiControllerAddGroup(
            name: $name,
            owner: ($owner ?? getenv('AUTH_ORGANIZATION_NAME')) ?: null,
            displayName: $displayName,
            isEnabled: $isEnabled,
            isTopGroup: $isTopGroup,
            parentId: $parentId,
            type: $type,
            users: $users,
            createdTime: $createdTime,
            updatedTime: $updatedTime
        ));
    }

    public function apiControllerDeleteGroup(
        string $name,
        ?string $owner = null,
    ): Response {
        return $this->connector->send(request: new ApiControllerDeleteGroup(
            name: $name,
            owner: ($owner ?? getenv('AUTH_ORGANIZATION_NAME')) ?: null,
        ));
    }

    /**
     * @param  string  $id  The id ( owner/name ) of the group
     */
    public function apiControllerGetGroup(string $id): Response
    {
        return $this->connector->send(request: new ApiControllerGetGroup(id: $id));
    }

    /**
     * @param  string  $owner  The owner of groups
     */
    public function apiControllerGetGroups(?string $owner = null): Response
    {
        return $this->connector->send(request: new ApiControllerGetGroups(
            owner: ($owner ?? getenv('AUTH_ORGANIZATION_NAME')) ?: null
        ));
    }

    /**
     * @param  string  $id  The id ( owner/name ) of the group
     * @param  string[]  $users
     */
    public function apiControllerUpdateGroup(
        string $id,
        ?string $name,
        ?string $displayName = null,
        ?string $owner = null,
        bool $isEnabled = true,
        bool $isTopGroup = true,
        ?string $parentId = null,
        GroupType $type = GroupType::VIRTUAL,
        array $users = [],
        ?string $createdTime = null,
        ?string $updatedTime = null,
    ): Response {
        return $this->connector->send(request: new ApiControllerUpdateGroup(
            id: $id,
            name: $name,
            displayName: $displayName,
            owner: ($owner ?? getenv('AUTH_ORGANIZATION_NAME')) ?: null,
            isEnabled: $isEnabled,
            isTopGroup: $isTopGroup,
            parentId: $parentId,
            type: $type,
            users: $users,
            createdTime: $createdTime,
            updatedTime: $updatedTime,
        ));
    }
}
