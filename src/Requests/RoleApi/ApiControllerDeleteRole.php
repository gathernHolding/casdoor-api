<?php

namespace Gathern\CasdoorAPI\Requests\RoleApi;

use DateTime;
use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.DeleteRole
 *
 * delete role
 */
class ApiControllerDeleteRole extends MainRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/delete-role';
    }

    /**
     * Default body
     *
     * @return array<string, mixed>
     */
    protected function defaultBody(): array
    {
        return array_filter([
            'displayName' => $this->displayName,
            'name' => $this->name,
            'owner' => $this->owner ?? getenv('AUTH_ORGANIZATION_NAME'),
            'createdTime' => $this->createdTime,
            'users' => $this->users,
            'groups' => $this->groups,
            'roles' => $this->roles,
            'domains' => $this->domains,
            'isEnabled' => $this->isEnabled,
        ]);
    }

    public function __construct(
        protected readonly string $displayName,
        protected readonly string $name,
        protected readonly ?string $owner = null,
        // protected readonly DateTime $createdTime = new DateTime('now'),
        protected readonly ?DateTime $createdTime = null,
        /** @var string[] */
        protected readonly array $users = [],
        /** @var string[] */
        protected readonly array $groups = [],
        /** @var string[] */
        protected readonly array $roles = [],
        /** @var string[] */
        protected readonly array $domains = [],
        protected readonly bool $isEnabled = true
    ) {}
}
