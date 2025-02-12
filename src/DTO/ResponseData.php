<?php

declare(strict_types=1);

namespace Gathern\CasdoorAPI\DTO;

use Gathern\CasdoorAPI\Enum\ResponseStatus;

/**
 * @template TData
 * @template TData2
 */
final class ResponseData
{
    public function __construct(
        public readonly ResponseStatus $status,
        public readonly ?string $msg,
        public readonly ?string $sub,
        public readonly ?string $name,
        /**
         * @var TData
         */
        public readonly mixed $data,
        /**
         * @var TData2
         */
        public readonly mixed $data2
    ) {}
}
