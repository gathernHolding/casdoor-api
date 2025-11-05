<?php

declare(strict_types=1);

namespace Gathern\CasdoorAPI\Requests\OidcApi;

use EventSauce\ObjectHydrator\ObjectMapperUsingReflection;
use Gathern\CasdoorAPI\DTO\OpenIdConfigurationResponseData;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * RootController.GetOidcDiscovery
 *
 * Get Oidc Discovery
 */
class RootControllerGetOidcDiscovery extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/.well-known/openid-configuration';
    }

    public function createDtoFromResponse(Response $response): OpenIdConfigurationResponseData
    {
        $data = $response->json();
        $mapper = new ObjectMapperUsingReflection;

        return $mapper->hydrateObject(className: OpenIdConfigurationResponseData::class, payload: $data); 
    }

    public function __construct() {}
}
