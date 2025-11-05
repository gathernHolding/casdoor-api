<?php

namespace Gathern\CasdoorAPI\DTO\Response;

class JWKData
{
    /**
     * @param  string[]  $x5c
     */
    public function __construct(
        public string $use,
        public string $kty,
        public string $kid,
        public string $alg,
        public string $n,
        public string $e,
        public array $x5c
    ) {}
}
