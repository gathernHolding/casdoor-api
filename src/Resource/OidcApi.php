<?php

declare(strict_types=1);

namespace Gathern\CasdoorAPI\Resource;

use Gathern\CasdoorAPI\Requests\OidcApi\RootControllerGetJwks;
use Gathern\CasdoorAPI\Requests\OidcApi\RootControllerGetOidcDiscovery;
use Gathern\CasdoorAPI\Resource;
use Saloon\Http\Response;

class OidcApi extends Resource
{
    public function rootControllerGetJwks(): Response
    {
        return $this->connector->send(new RootControllerGetJwks);
    }

    public function rootControllerGetOidcDiscovery(): Response
    {
        return $this->connector->send(new RootControllerGetOidcDiscovery);
    }
}
