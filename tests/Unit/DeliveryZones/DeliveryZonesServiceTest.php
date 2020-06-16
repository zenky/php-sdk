<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\DeliveryZones;

use Zenky\Api\Requests\CreateRequest;
use Zenky\Api\Requests\DeleteRequest;
use Zenky\Api\Requests\ListRequest;
use Zenky\Api\Requests\ShowRequest;
use Zenky\Api\Requests\UpdateRequest;
use Zenky\Cities\City;
use Zenky\DeliveryZones\DeliveryZonesService;
use Zenky\DeliveryZones\Interfaces\DeliveryZoneInterface;
use Zenky\DeliveryZones\Interfaces\Responses\PaginatedDeliveryZonesResponseInterface;
use Zenky\Tests\TestCase;

class DeliveryZonesServiceTest extends TestCase
{
    public function testItShouldCreateDeliveryZones()
    {
        $store = $this->createStore();
        $city = new City(['id' => 'city-id']);
        $request = new CreateRequest([]);

        $client = $this->createHttpMockForCreateRequest(
            $store,
            $request,
            'cities/city-id/delivery-zones',
            fn () => $this->createFakeResponseForEntity('delivery-zones/zone.json')
        );

        $service = new DeliveryZonesService($client, 'secret');
        $item = $service->create($store, $city, $request);
        $this->assertInstanceOf(DeliveryZoneInterface::class, $item);
    }

    public function testItShouldListDeliveryZones()
    {
        $store = $this->createStore();
        $city = new City(['id' => 'city-id']);
        $request = new ListRequest();

        $client = $this->createHttpMockForListRequest(
            $store,
            $request,
            'cities/city-id/delivery-zones',
            fn () => $this->createFakeResponseForEntitiesCollection(5, 'delivery-zones/zone.json')
        );

        $service = new DeliveryZonesService($client, 'secret');
        $response = $service->list($store, $city, $request);
        $this->assertInstanceOf(PaginatedDeliveryZonesResponseInterface::class, $response);
        $this->assertSame(5, count($response->getItems()));

        foreach ($response->getItems() as $item) {
            $this->assertInstanceOf(DeliveryZoneInterface::class, $item);
        }
    }

    public function testItShouldShowDeliveryZones()
    {
        $store = $this->createStore();
        $city = new City(['id' => 'city-id']);
        $request = new ShowRequest('id');

        $client = $this->createHttpMockForShowRequest(
            $store,
            $request,
            'cities/city-id/delivery-zones/id',
            fn () => $this->createFakeResponseForEntity('delivery-zones/zone.json')
        );

        $service = new DeliveryZonesService($client, 'secret');
        $item = $service->show($store, $city, $request);
        $this->assertInstanceOf(DeliveryZoneInterface::class, $item);
    }

    public function testItShouldUpdateDeliveryZones()
    {
        $store = $this->createStore();
        $city = new City(['id' => 'city-id']);
        $request = new UpdateRequest('id', []);

        $client = $this->createHttpMockForUpdateRequest(
            $store,
            $request,
            'cities/city-id/delivery-zones/id',
            fn () => $this->createFakeResponseForEntity('delivery-zones/zone.json')
        );

        $service = new DeliveryZonesService($client, 'secret');
        $item = $service->update($store, $city, $request);
        $this->assertInstanceOf(DeliveryZoneInterface::class, $item);
    }

    public function testItShouldDeleteDeliveryZones()
    {
        $store = $this->createStore();
        $city = new City(['id' => 'city-id']);
        $request = new DeleteRequest('id');

        $client = $this->createHttpMockForDeleteRequest(
            $store,
            $request,
            'cities/city-id/delivery-zones/id',
        );

        $service = new DeliveryZonesService($client, 'secret');
        $service->delete($store, $city, $request);
    }
}
