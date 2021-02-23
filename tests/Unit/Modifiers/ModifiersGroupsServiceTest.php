<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\Modifiers;

use Zenky\Api\Requests\CreateRequest;
use Zenky\Api\Requests\DeleteRequest;
use Zenky\Api\Requests\ListRequest;
use Zenky\Api\Requests\ShowRequest;
use Zenky\Api\Requests\UpdateRequest;
use Zenky\Modifiers\ModifiersGroupsService;
use Zenky\Modifiers\Interfaces\ModifiersGroupInterface;
use Zenky\Modifiers\Interfaces\Responses\PaginatedModifiersGroupsResponseInterface;
use Zenky\Tests\TestCase;

class ModifiersGroupsServiceTest extends TestCase
{
    public function testItShouldCreateModifiersGroups()
    {
        $store = $this->createStore();
        $request = new CreateRequest([]);

        $client = $this->createHttpMockForCreateRequest(
            $store,
            $request,
            'modifiers-groups',
            fn () => $this->createFakeResponseForEntity('modifiers/modifiers-group.json')
        );

        $service = new ModifiersGroupsService($client, 'secret');
        $item = $service->create($store, $request);
        $this->assertInstanceOf(ModifiersGroupInterface::class, $item);
    }

    public function testItShouldListModifiersGroups()
    {
        $store = $this->createStore();
        $request = new ListRequest();

        $client = $this->createHttpMockForListRequest(
            $store,
            $request,
            'modifiers-groups',
            fn () => $this->createFakeResponseForEntitiesCollection(5, 'modifiers/modifiers-group.json')
        );

        $service = new ModifiersGroupsService($client, 'secret');
        $response = $service->list($store, $request);
        $this->assertInstanceOf(PaginatedModifiersGroupsResponseInterface::class, $response);
        $this->assertSame(5, count($response->getItems()));

        foreach ($response->getItems() as $item) {
            $this->assertInstanceOf(ModifiersGroupInterface::class, $item);
        }
    }

    public function testItShouldShowModifiersGroups()
    {
        $store = $this->createStore();
        $request = new ShowRequest('id');

        $client = $this->createHttpMockForShowRequest(
            $store,
            $request,
            'modifiers-groups/id',
            fn () => $this->createFakeResponseForEntity('modifiers/modifiers-group.json')
        );

        $service = new ModifiersGroupsService($client, 'secret');
        $item = $service->show($store, $request);
        $this->assertInstanceOf(ModifiersGroupInterface::class, $item);
    }

    public function testItShouldUpdateModifiersGroups()
    {
        $store = $this->createStore();
        $request = new UpdateRequest('id', []);

        $client = $this->createHttpMockForUpdateRequest(
            $store,
            $request,
            'modifiers-groups/id',
            fn () => $this->createFakeResponseForEntity('modifiers/modifiers-group.json')
        );

        $service = new ModifiersGroupsService($client, 'secret');
        $item = $service->update($store, $request);
        $this->assertInstanceOf(ModifiersGroupInterface::class, $item);
    }

    public function testItShouldDeleteModifiersGroups()
    {
        $store = $this->createStore();
        $request = new DeleteRequest('id');

        $client = $this->createHttpMockForDeleteRequest(
            $store,
            $request,
            'modifiers-groups/id'
        );

        $service = new ModifiersGroupsService($client, 'secret');
        $service->delete($store, $request);
    }
}
