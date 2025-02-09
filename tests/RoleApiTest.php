<?php

use Gathern\CasdoorAPI\CasdoorConnector;
use Gathern\CasdoorAPI\DTO\ResponseData;
use Gathern\CasdoorAPI\Enum\ResponseStatus;
use Gathern\CasdoorAPI\Requests\RoleApi\ApiControllerAddRole;
use Gathern\CasdoorAPI\Requests\RoleApi\ApiControllerGetRole;
use Gathern\CasdoorAPI\Requests\RoleApi\ApiControllerGetRoles;
use Gathern\CasdoorAPI\Requests\RoleApi\ApiControllerUpdateRole;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

describe('RoleApiTest', function (): void {

    beforeEach(function (): void {
        $this->connector = new CasdoorConnector;
    });
    it('Gets all roles successfully', function (): void {
        $this->connector->withMockClient(new MockClient([
            ApiControllerGetRoles::class => MockResponse::fixture('Roles/list/success'),
        ]));
        $response = $this->connector->roleApi()->apiControllerGetRoles();
        $responseData = $response->dto();
        expect(value: $responseData->status)->toBe(ResponseStatus::OK)
            ->and($responseData->data)->toHaveCount(count: 13);

    });

    it('Gets role details by name successfully', function (): void {
        $this->connector->withMockClient(new MockClient([
            ApiControllerGetRole::class => MockResponse::fixture('Roles/details/success'),
        ]));
        $response = $this->connector->roleApi()->apiControllerGetRole(id: 'investors');
        expect(value: $response->dto()->status)->toBe(ResponseStatus::OK);
    });

    it('add new role successfully', function (): void {

        $this->connector->withMockClient(new MockClient([
            ApiControllerAddRole::class => MockResponse::fixture('Roles/save/success'),

        ]));

        $response = $this->connector->roleApi()->apiControllerAddRole(
            name: 'new_role',
            displayName: 'NEW_ROLE_ROLE',
        );

        expect(value: $response->dto()->data)->toBe('Affected');

    });

    it('update Role successfully', function (): void {

        $this->connector->withMockClient(new MockClient([
            ApiControllerGetRole::class => MockResponse::fixture('Roles/details/success'),
            ApiControllerUpdateRole::class => MockResponse::fixture('Roles/update/success'),

        ]));
        $response = $this->connector->roleApi()->apiControllerGetRole(id: 'investors');
        /** @var ResponseData $roleDetails */
        $roleDetails = $response->dto();

        $response = $this->connector->roleApi()->apiControllerUpdateRoleFromRoleData(
            $roleDetails->data,
            displayName: 'ROLE_'.strtoupper($roleDetails->data->name),
        );
        expect(value: $response->dto()->data)->toBe('Affected');

    });

});
