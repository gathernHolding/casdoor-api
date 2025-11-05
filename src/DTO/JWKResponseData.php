<?php

declare(strict_types=1);

namespace Gathern\CasdoorAPI\DTO;

use EventSauce\ObjectHydrator\PropertyCasters\CastListToType;
use Gathern\CasdoorAPI\DTO\Response\JWKData;

/**
 * @template TData
 * @template TData2
 */
final class JWKResponseData
{

    /**
     * @param \Gathern\CasdoorAPI\DTO\Response\JWKData[] $keys
     */
    public function __construct(
        #[CastListToType(JWKData::class)]
        public array $keys
    ) {}
}
