<?php

declare(strict_types=1);

namespace Gathern\CasdoorAPI\DTO\Response;

class GroupData
{
    public function __construct(
        public ?string $owner,
        public ?string $name,
        public ?string $createdTime,
        public ?string $updatedTime,
        public ?string $displayName,
        public ?string $manager,
        public ?string $contactEmail,
        public ?string $type,
        public ?string $parentId,
        public ?string $parentName,
        public ?bool $isTopGroup,
        /** @var string[] */
        public ?array $users,
        public ?bool $haveChildren,
        public ?bool $isEnabled
    ) {}
}
