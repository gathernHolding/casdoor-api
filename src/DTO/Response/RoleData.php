<?php

declare(strict_types=1);

namespace Gathern\CasdoorAPI\DTO\Response;

use EventSauce\ObjectHydrator\MapFrom;

final class RoleData
{
    /**
     * @param  string[]  $users
     * @param  string[]  $groups
     * @param  string[]  $roles
     * @param  string[]  $domains
     */
    public function __construct(
        public readonly string $owner,
        public readonly string $name,
        public readonly ?string $createdTime,
        public readonly ?string $displayName,
        public readonly ?string $description,
        public readonly ?array $users,
        public readonly ?array $groups,
        public readonly ?array $roles,
        public readonly ?array $domains,
        #[MapFrom('isEnabled')]
        public readonly bool $isEnabled
    ) {}
}
