<?php

namespace Gathern\CasdoorAPI\Resource;

use Saloon\Http\Response;
use Gathern\CasdoorAPI\Requests\SyncerApi\ApiControllerAddSyncer;
use Gathern\CasdoorAPI\Requests\SyncerApi\ApiControllerDeleteSyncer;
use Gathern\CasdoorAPI\Requests\SyncerApi\ApiControllerGetSyncer;
use Gathern\CasdoorAPI\Requests\SyncerApi\ApiControllerGetSyncers;
use Gathern\CasdoorAPI\Requests\SyncerApi\ApiControllerRunSyncer;
use Gathern\CasdoorAPI\Requests\SyncerApi\ApiControllerUpdateSyncer;
use Gathern\CasdoorAPI\Resource;

class SyncerApi extends Resource
{
    public function apiControllerAddSyncer(): Response
    {
        return $this->connector->send(new ApiControllerAddSyncer());
    }


    public function apiControllerDeleteSyncer(): Response
    {
        return $this->connector->send(new ApiControllerDeleteSyncer());
    }


    /**
     * @param mixed $id The id ( owner/name ) of the syncer
     */
    public function apiControllerGetSyncer(mixed $id): Response
    {
        return $this->connector->send(new ApiControllerGetSyncer($id));
    }


    /**
     * @param mixed $owner The owner of syncers
     */
    public function apiControllerGetSyncers(mixed $owner): Response
    {
        return $this->connector->send(new ApiControllerGetSyncers($owner));
    }


    public function apiControllerRunSyncer(): Response
    {
        return $this->connector->send(new ApiControllerRunSyncer());
    }


    /**
     * @param mixed $id The id ( owner/name ) of the syncer
     */
    public function apiControllerUpdateSyncer(mixed $id): Response
    {
        return $this->connector->send(new ApiControllerUpdateSyncer($id));
    }
}
