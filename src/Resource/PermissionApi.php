<?php

declare(strict_types=1);

namespace Gathern\CasdoorAPI\Resource;

use Gathern\CasdoorAPI\Requests\PermissionApi\ApiControllerAddPermission;
use Gathern\CasdoorAPI\Requests\PermissionApi\ApiControllerDeletePermission;
use Gathern\CasdoorAPI\Requests\PermissionApi\ApiControllerGetPermission;
use Gathern\CasdoorAPI\Requests\PermissionApi\ApiControllerGetPermissions;
use Gathern\CasdoorAPI\Requests\PermissionApi\ApiControllerGetPermissionsByRole;
use Gathern\CasdoorAPI\Requests\PermissionApi\ApiControllerGetPermissionsBySubmitter;
use Gathern\CasdoorAPI\Requests\PermissionApi\ApiControllerUpdatePermission;
use Gathern\CasdoorAPI\Resource;
use Saloon\Http\Response;

class PermissionApi extends Resource
{
    public function apiControllerAddPermission(): Response
    {
        return $this->connector->send(new ApiControllerAddPermission);
    }

    public function apiControllerDeletePermission(): Response
    {
        return $this->connector->send(new ApiControllerDeletePermission);
    }

    /**
     * @param  mixed  $id  The id ( owner/name ) of the permission
     */
    public function apiControllerGetPermission(mixed $id): Response
    {
        return $this->connector->send(new ApiControllerGetPermission($id));
    }

    /**
     * @param  mixed  $owner  The owner of permissions
     */
    public function apiControllerGetPermissions(mixed $owner): Response
    {
        return $this->connector->send(new ApiControllerGetPermissions($owner));
    }

    /**
     * @param  mixed  $id  The id ( owner/name ) of the role
     */
    public function apiControllerGetPermissionsByRole(mixed $id): Response
    {
        return $this->connector->send(new ApiControllerGetPermissionsByRole($id));
    }

    public function apiControllerGetPermissionsBySubmitter(): Response
    {
        return $this->connector->send(new ApiControllerGetPermissionsBySubmitter);
    }

    /**
     * @param  mixed  $id  The id ( owner/name ) of the permission
     */
    public function apiControllerUpdatePermission(mixed $id): Response
    {
        return $this->connector->send(new ApiControllerUpdatePermission($id));
    }
}
