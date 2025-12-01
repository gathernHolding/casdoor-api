<?php

declare(strict_types=1);

namespace Gathern\CasdoorAPI\Requests\OidcApi;

use EventSauce\ObjectHydrator\ObjectMapperUsingReflection;
use Gathern\CasdoorAPI\DTO\JWKResponseData;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * RootController.GetJwks
 */
class RootControllerGetJwks extends Request
{
    protected Method $method = Method::GET;

    protected ?string $dataClassName = JWKResponseData::class;

    protected bool $isCollectionData = true;

    public function resolveEndpoint(): string
    {
        return '/.well-known/jwks';
    }

    public function createDtoFromResponse(Response $response): JWKResponseData
    {
        $data = $response->json();
        $mapper = new ObjectMapperUsingReflection;

        return $mapper->hydrateObject(className: JWKResponseData::class, payload: $data);
    }

    public function __construct() {}
}
