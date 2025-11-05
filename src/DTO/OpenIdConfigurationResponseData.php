<?php

declare(strict_types=1);

namespace Gathern\CasdoorAPI\DTO;

use EventSauce\ObjectHydrator\PropertyCasters\CastListToType;
use Gathern\CasdoorAPI\DTO\Response\JWKData;

/**
 * @template TData
 * @template TData2
 */
final class OpenIdConfigurationResponseData
{
    /**
     * @param string[] $responseTypesSupported
     * @param string[] $responseModesSupported
     * @param string[] $grantTypesSupported
     * @param string[] $subjectTypesSupported
     * @param string[] $idTokenSigningAlgValuesSupported
     * @param string[] $scopesSupported
     * @param string[] $claimsSupported
     * @param string[] $requestObjectSigningAlgValuesSupported
     */
    public function __construct(
        public string $issuer,
        public string $authorizationEndpoint,
        public string $tokenEndpoint,
        public string $userinfoEndpoint,
        public string $deviceAuthorizationEndpoint,
        public string $jwksUri,
        public string $introspectionEndpoint,
        public array $responseTypesSupported,
        public array $responseModesSupported,
        public array $grantTypesSupported,
        public array $subjectTypesSupported,
        public array $idTokenSigningAlgValuesSupported,
        public array $scopesSupported,
        public array $claimsSupported,
        public bool $requestParameterSupported,
        public array $requestObjectSigningAlgValuesSupported,
        public string $endSessionEndpoint
    ) {}
}
