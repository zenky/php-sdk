<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\Cities;

use Zenky\Api\Requests\CreateRequest;
use Zenky\Api\Requests\DeleteRequest;
use Zenky\Api\Requests\ListRequest;
use Zenky\Api\Requests\ShowRequest;
use Zenky\Api\Requests\UpdateRequest;
use Zenky\Cities\CitiesService;
use Zenky\Cities\Interfaces\CityInterface;
use Zenky\Cities\Interfaces\Responses\PaginatedCitiesResponseInterface;
use Zenky\Tests\Fakes\FakeResponse;
use Zenky\Tests\TestCase;

class CitiesServiceTest extends TestCase
{
    public function testItShouldCreateCities()
    {
        $store = $this->createStore();
        $request = new CreateRequest([]);

        $client = $this->createHttpMockForCreateRequest(
            $store,
            $request,
            'cities',
            fn () => $this->createFakeResponseForEntity('cities/city.json')
        );

        $service = new CitiesService($client, 'secret');
        $city = $service->create($store, $request);
        $this->assertInstanceOf(CityInterface::class, $city);
    }

    public function testItShouldListCities()
    {
        $store = $this->createStore();
        $request = new ListRequest();

        $client = $this->createHttpMockForListRequest(
            $store,
            $request,
            'cities',
            fn () => $this->createFakeResponseForEntitiesCollection(5, 'cities/city.json')
        );

        $service = new CitiesService($client, 'secret');
        $response = $service->list($store, $request);
        $this->assertInstanceOf(PaginatedCitiesResponseInterface::class, $response);
        $this->assertSame(5, count($response->getItems()));

        foreach ($response->getItems() as $item) {
            $this->assertInstanceOf(CityInterface::class, $item);
        }
    }

    public function testItShouldShowCities()
    {
        $store = $this->createStore();
        $entity = $this->createEntity('cities/city.json');
        $request = new ShowRequest($entity['id']);

        $client = $this->createHttpMockForShowRequest(
            $store,
            $request,
            'cities/'.$entity['id'],
            fn () => FakeResponse::make(['data' => $entity])
        );

        $service = new CitiesService($client, 'secret');
        $city = $service->show($store, $request);
        $this->assertInstanceOf(CityInterface::class, $city);
    }

    public function testItShouldUpdateCities()
    {
        $store = $this->createStore();
        $entity = $this->createEntity('cities/city.json');
        $request = new UpdateRequest($entity['id'], []);

        $client = $this->createHttpMockForUpdateRequest(
            $store,
            $request,
            'cities/'.$entity['id'],
            fn () => FakeResponse::make(['data' => $entity])
        );

        $service = new CitiesService($client, 'secret');
        $city = $service->update($store, $request);
        $this->assertInstanceOf(CityInterface::class, $city);
    }

    public function testItShouldDeleteCities()
    {
        $store = $this->createStore();
        $entity = $this->createEntity('cities/city.json');
        $request = new DeleteRequest($entity['id']);

        $client = $this->createHttpMockForDeleteRequest(
            $store,
            $request,
            'cities/'.$entity['id']
        );

        $service = new CitiesService($client, 'secret');
        $service->delete($store, $request);
    }
}
