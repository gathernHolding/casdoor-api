<?php

namespace Gathern\CasdoorAPI\Requests\UserApi;

use DateTime;
use DateTimeInterface;
use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.AddUser
 *
 * add user
 */
class ApiControllerAddUser extends MainRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/add-user';
    }

    /**
     * Default body
     *
     * @return array<string, mixed>
     */
    protected function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'displayName' => $this->displayName,
            'email' => $this->email,
            'phone' => $this->phone,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'language' => $this->language,
            'bio' => $this->bio,
            'address' => $this->address,
            'birthday' => $this->birthday,
            'countryCode' => $this->countryCode,
            'owner' => $this->owner ?? getenv(name: 'AUTH_ORGANIZATION_NAME'),
            'properties' => $this->properties,
            'createdTime' => $this->createdTime?->format(DateTimeInterface::RFC3339_EXTENDED),
            'managedAccounts' => $this->managedAccounts,
            'ranking' => $this->ranking,
            'region' => $this->region,
            'roles' => $this->roles,
        ]);
    }

    /**
     * @param  string[]|null  $address
     * @param  string[]|null  $managedAccounts
     * @param  string[]|null  $roles
     * @param  array<string,string>|null  $properties
     */
    public function __construct(
        protected readonly ?string $name,
        protected readonly ?string $email = null,
        protected readonly ?string $phone = null,
        protected readonly ?string $firstName = null,
        protected readonly ?string $gender = null,
        protected readonly ?string $lastName = null,
        protected readonly ?string $language = null,
        protected readonly ?string $bio = null,
        protected readonly ?string $displayName = null,
        protected readonly ?array $address = [],
        protected readonly ?string $birthday = null,
        protected readonly ?string $countryCode = '+966',
        protected readonly ?string $owner = null,
        protected readonly ?array $properties = [],
        protected readonly ?DateTime $createdTime = new DateTime('now'),
        protected readonly ?array $managedAccounts = null,
        protected readonly ?int $ranking = null,
        protected readonly ?string $region = null,
        protected readonly ?array $roles = [],
    ) {}
}
