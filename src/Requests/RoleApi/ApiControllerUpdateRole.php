<?php

declare(strict_types=1);

namespace Gathern\CasdoorAPI\Requests\RoleApi;

use DateTime;
use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.UpdateRole
 *
 * update role
 */
class ApiControllerUpdateRole extends MainRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/update-role';
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
            'owner' => $this->owner,
            'createdTime' => $this->createdTime,
            'users' => $this->createCasdoorForValues($this->users ?? []),
            'groups' => $this->createCasdoorForValues($this->groups ?? []),
            'roles' => $this->createCasdoorForValues($this->roles ?? []),
            'domains' => $this->createCasdoorForValues($this->domains ?? []),
            'isEnabled' => $this->isEnabled,
        ]);
    }

    /**
     * Summary of defaultQuery
     *
     * @return array<string,mixed>
     */
    public function defaultQuery(): array
    {
        return array_filter(['id' => $this->createCasdoorId($this->id)]);
    }

    /**
     * @param  string  $id  The id ( owner/name ) of the role
     */
    public function __construct(
        protected string $id,
        public readonly ?string $displayName,
        public readonly string $name,
        public readonly string $owner,
        // public readonly DateTime $createdTime = new DateTime('now'),
        public readonly ?DateTime $createdTime = null,
        /** @var null|string[] */
        public readonly ?array $users = [],
        /** @var null|string[] */
        public readonly ?array $groups = [],
        /** @var null|string[] */
        public readonly ?array $roles = [],
        /** @var null|string[] */
        public readonly ?array $domains = [],
        public readonly bool $isEnabled = true

    ) {}
}
