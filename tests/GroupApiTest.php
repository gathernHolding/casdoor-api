<?php

use Gathern\CasdoorAPI\CasdoorConnector;
use Gathern\CasdoorAPI\DTO\ResponseData;
use Gathern\CasdoorAPI\Enum\ResponseStatus;
use Gathern\CasdoorAPI\Requests\GroupApi\ApiControllerAddGroup;
use Gathern\CasdoorAPI\Requests\GroupApi\ApiControllerGetGroup;
use Gathern\CasdoorAPI\Requests\GroupApi\ApiControllerGetGroups;
use Gathern\CasdoorAPI\Requests\GroupApi\ApiControllerUpdateGroup;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

describe('RoleApiTest', function (): void {

    beforeEach(function (): void {
        $this->connector = new CasdoorConnector;
    });
    it('Gets all groups successfully', function (): void {
        $this->connector->withMockClient(new MockClient([
            ApiControllerGetGroups::class => MockResponse::fixture('Groups/list/success'),
        ]));
        $response = $this->connector->groupApi()->apiControllerGetGroups('built-in');
        $responseData = $response->dto();
        expect(value: $responseData->status)->toBe(ResponseStatus::OK)
            ->and($responseData->data)->toHaveCount(count: 5);

    });

    it('Gets group details by name successfully', function (): void {
        $this->connector->withMockClient(new MockClient([
            ApiControllerGetGroup::class => MockResponse::fixture('Groups/details/success'),
        ]));
        $response = $this->connector->groupApi()->apiControllerGetGroup(id: 'parent');
        expect(value: $response->dto()->status)->toBe(ResponseStatus::OK);
    });

    it('add new group successfully', function (): void {

        $this->connector->withMockClient(new MockClient([
            ApiControllerAddGroup::class => MockResponse::fixture('Groups/save/success'),

        ]));

        $response = $this->connector->groupApi()->apiControllerAddGroup(
            name: 'new_group',
        );

        expect(value: $response->dto()->data)->toBe('Affected');

    });

    it('update Group successfully', function (): void {

        $this->connector->withMockClient(new MockClient([
            ApiControllerGetGroup::class => MockResponse::fixture('Groups/details/success'),
            ApiControllerUpdateGroup::class => MockResponse::fixture('Groups/update/success'),

        ]));
        $response = $this->connector->groupApi()->apiControllerGetGroup(id: 'parent');
        /** @var ResponseData $groupDetails */
        $groupDetails = $response->dto();
        $response = $this->connector->groupApi()->apiControllerUpdateGroup(
            id: $groupDetails->data->name,
            name: 'GROUP_'.strtoupper($groupDetails->data->name),
        );
        expect(value: $response->dto()->data)->toBe('Affected');

    });

});
