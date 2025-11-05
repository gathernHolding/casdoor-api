<?php

declare(strict_types=1);

use Gathern\CasdoorAPI\CasdoorConnector;
use Gathern\CasdoorAPI\Requests\OidcApi\RootControllerGetJwks;
use Gathern\CasdoorAPI\Requests\OidcApi\RootControllerGetOidcDiscovery;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Response;

describe('OIDCApiTest', function (): void {

    beforeEach(function (): void {
        $this->connector = new CasdoorConnector;
    });

    it('Gets jwks successfully', function (): void {
        $this->connector->withMockClient(new MockClient([
            RootControllerGetJwks::class => MockResponse::fixture('jwks/success'),
        ]));
        $response = $this->connector->oidcApi()->rootControllerGetJwks();
        $responseData = $response->dto();
        expect($response->status())->toBe(200);
        expect(value: $responseData->keys)->toHaveCount(2);
    });
    it('Gets openId configuration successfully', function (): void {
        $this->connector->withMockClient(new MockClient([
            RootControllerGetOidcDiscovery::class => MockResponse::fixture('jwks/discovery/success'),
        ]));
        $response = $this->connector->oidcApi()->rootControllerGetOidcDiscovery();
        $responseData = $response->dto();
        expect($response->status())->toBe(200);
    });
});
