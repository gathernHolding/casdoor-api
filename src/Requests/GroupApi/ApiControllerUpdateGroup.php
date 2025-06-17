<?php

namespace Gathern\CasdoorAPI\Requests\GroupApi;

use Gathern\CasdoorAPI\Enum\GroupType;
use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.UpdateGroup
 *
 * update group
 */
class ApiControllerUpdateGroup extends MainRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/update-group';
    }

    /**
     * Default body
     *
     * @return array<string, mixed>
     */
    protected function defaultBody(): array
    {
        return array_filter(array: [
            'name' => $this->name,
            'displayName' => $this->displayName,
            'owner' => $this->owner ?? getenv('AUTH_ORGANIZATION_NAME'),
            'isEnabled' => $this->isEnabled,
            'isTopGroup' => $this->isTopGroup,
            'parentId' => $this->parentId,
            'type' => $this->type,
            'users' => $this->users,
            'createdTime' => $this->createdTime,
            'updatedTime' => $this->updatedTime,
        ]);
    }

    /**
     * @param  string  $id  The id ( owner/name ) of the group
     * @param  string[]  $users
     */
    public function __construct(
        protected string $id,
        protected ?string $name,
        protected ?string $displayName = null,
        protected ?string $owner = null,
        protected bool $isEnabled = true,
        protected bool $isTopGroup = true,
        protected ?string $parentId = null,
        protected GroupType $type = GroupType::VIRTUAL,
        /** * @var  string[]  */
        protected array $users = [],
        protected ?string $createdTime = null,
        protected ?string $updatedTime = null,

    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'id' => $this->createCasdoorId(name: $this->id),

        ]);
    }
}
