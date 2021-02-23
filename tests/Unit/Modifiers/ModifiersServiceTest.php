<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\Modifiers;

use Zenky\Api\Requests\CreateRequest;
use Zenky\Api\Requests\DeleteRequest;
use Zenky\Api\Requests\ListRequest;
use Zenky\Api\Requests\ShowRequest;
use Zenky\Api\Requests\UpdateRequest;
use Zenky\Modifiers\ModifiersService;
use Zenky\Modifiers\Interfaces\ModifierInterface;
use Zenky\Modifiers\Interfaces\Responses\PaginatedModifiersResponseInterface;
use Zenky\Tests\TestCase;

class ModifiersServiceTest extends TestCase
{
    public function testItShouldCreateModifiers()
    {
        $store = $this->createStore();
        $request = new CreateRequest([]);

        $client = $this->createHttpMockForCreateRequest(
            $store,
            $request,
            'modifiers',
            fn () => $this->createFakeResponseForEntity('modifiers/modifier.json')
        );

        $service = new ModifiersService($client, 'secret');
        $item = $service->create($store, $request);
        $this->assertInstanceOf(ModifierInterface::class, $item);
    }

    public function testItShouldListModifiers()
    {
        $store = $this->createStore();
        $request = new ListRequest();

        $client = $this->createHttpMockForListRequest(
            $store,
            $request,
            'modifiers',
            fn () => $this->createFakeResponseForEntitiesCollection(5, 'modifiers/modifier.json')
        );

        $service = new ModifiersService($client, 'secret');
        $response = $service->list($store, $request);
        $this->assertInstanceOf(PaginatedModifiersResponseInterface::class, $response);
        $this->assertSame(5, count($response->getItems()));

        foreach ($response->getItems() as $item) {
            $this->assertInstanceOf(ModifierInterface::class, $item);
        }
    }

    public function testItShouldShowModifiers()
    {
        $store = $this->createStore();
        $request = new ShowRequest('id');

        $client = $this->createHttpMockForShowRequest(
            $store,
            $request,
            'modifiers/id',
            fn () => $this->createFakeResponseForEntity('modifiers/modifier.json')
        );

        $service = new ModifiersService($client, 'secret');
        $item = $service->show($store, $request);
        $this->assertInstanceOf(ModifierInterface::class, $item);
    }

    public function testItShouldUpdateModifiers()
    {
        $store = $this->createStore();
        $request = new UpdateRequest('id', []);

        $client = $this->createHttpMockForUpdateRequest(
            $store,
            $request,
            'modifiers/id',
            fn () => $this->createFakeResponseForEntity('modifiers/modifier.json')
        );

        $service = new ModifiersService($client, 'secret');
        $item = $service->update($store, $request);
        $this->assertInstanceOf(ModifierInterface::class, $item);
    }

    public function testItShouldDeleteModifiers()
    {
        $store = $this->createStore();
        $request = new DeleteRequest('id');

        $client = $this->createHttpMockForDeleteRequest(
            $store,
            $request,
            'modifiers/id'
        );

        $service = new ModifiersService($client, 'secret');
        $service->delete($store, $request);
    }
}
