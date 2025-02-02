<?php

declare(strict_types=1);

namespace Gathern\CasdoorAPI\DTO;

use Gathern\CasdoorAPI\Enum\ResponseStatus;

final class ResponseData
{
    public function __construct(
        public readonly ResponseStatus $status,
        public readonly ?string $msg,
        public readonly ?string $sub,
        public readonly ?string $name,
        /**
         * @var T-Data
         */
        public readonly mixed $data, // @phpstan-ignore-line
        /**
         * @var T-Data
         */
        public readonly mixed $data2 // @phpstan-ignore-line
    ) {}
}
