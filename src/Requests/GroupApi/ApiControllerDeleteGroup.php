<?php

namespace Gathern\CasdoorAPI\Requests\GroupApi;

use Gathern\CasdoorAPI\Requests\MainRequest;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ApiController.DeleteGroup
 *
 * delete group
 */
class ApiControllerDeleteGroup extends MainRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/delete-group';
    }

    public function __construct(

        protected readonly string $name,
        protected readonly ?string $owner = null,
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
        ]);
    }
}
