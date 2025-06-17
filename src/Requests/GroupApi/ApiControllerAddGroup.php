<?php

namespace Gathern\CasdoorAPI\Requests\GroupApi;

use Gathern\CasdoorAPI\Enum\GroupType;
use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.AddGroup
 *
 * add group
 */
class ApiControllerAddGroup extends MainRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/add-group';
    }

    public function __construct(

        protected readonly string $name,
        protected readonly ?string $owner = null,
        protected readonly ?string $displayName = null,
        protected readonly bool $isEnabled = true,
        protected readonly bool $isTopGroup = true,
        protected readonly ?string $parentId = null,
        protected readonly GroupType $type = GroupType::VIRTUAL,
        /**
         * @var string[] $users
         */
        protected readonly array $users = [],
        protected readonly ?string $createdTime = null,
        protected readonly ?string $updatedTime = null,
    ) {}

    /**
     * Default body
     *
     * @return array<string, mixed>
     */
    protected function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'owner' => $this->owner ?? getenv('AUTH_ORGANIZATION_NAME'),
            'displayName' => $this->displayName,
            'isEnabled' => $this->isEnabled,
            'isTopGroup' => $this->isTopGroup,
            'parentId' => $this->parentId,
            'type' => $this->type,
            'users' => $this->users,
            'createdTime' => $this->createdTime,
            'updatedTime' => $this->updatedTime,
        ]);
    }
}
