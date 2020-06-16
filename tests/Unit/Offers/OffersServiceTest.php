<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\Offers;

use Zenky\Api\Requests\CreateRequest;
use Zenky\Api\Requests\DeleteRequest;
use Zenky\Api\Requests\ListRequest;
use Zenky\Api\Requests\ShowRequest;
use Zenky\Api\Requests\UpdateRequest;
use Zenky\Offers\OffersService;
use Zenky\Offers\Interfaces\OfferInterface;
use Zenky\Offers\Interfaces\Responses\PaginatedOffersResponseInterface;
use Zenky\Tests\TestCase;

class OffersServiceTest extends TestCase
{
    public function testItShouldCreateOffers()
    {
        $store = $this->createStore();
        $request = new CreateRequest([]);

        $client = $this->createHttpMockForCreateRequest(
            $store,
            $request,
            'offers',
            fn () => $this->createFakeResponseForEntity('offers/offer.json')
        );

        $service = new OffersService($client, 'secret');
        $item = $service->create($store, $request);
        $this->assertInstanceOf(OfferInterface::class, $item);
    }

    public function testItShouldListOffers()
    {
        $store = $this->createStore();
        $request = new ListRequest();

        $client = $this->createHttpMockForListRequest(
            $store,
            $request,
            'offers',
            fn () => $this->createFakeResponseForEntitiesCollection(5, 'offers/offer.json')
        );

        $service = new OffersService($client, 'secret');
        $response = $service->list($store, $request);
        $this->assertInstanceOf(PaginatedOffersResponseInterface::class, $response);
        $this->assertSame(5, count($response->getItems()));

        foreach ($response->getItems() as $item) {
            $this->assertInstanceOf(OfferInterface::class, $item);
        }
    }

    public function testItShouldShowOffers()
    {
        $store = $this->createStore();
        $request = new ShowRequest('id');

        $client = $this->createHttpMockForShowRequest(
            $store,
            $request,
            'offers/id',
            fn () => $this->createFakeResponseForEntity('offers/offer.json')
        );

        $service = new OffersService($client, 'secret');
        $item = $service->show($store, $request);
        $this->assertInstanceOf(OfferInterface::class, $item);
    }

    public function testItShouldUpdateOffers()
    {
        $store = $this->createStore();
        $request = new UpdateRequest('id', []);

        $client = $this->createHttpMockForUpdateRequest(
            $store,
            $request,
            'offers/id',
            fn () => $this->createFakeResponseForEntity('offers/offer.json')
        );

        $service = new OffersService($client, 'secret');
        $item = $service->update($store, $request);
        $this->assertInstanceOf(OfferInterface::class, $item);
    }

    public function testItShouldDeleteOffers()
    {
        $store = $this->createStore();
        $request = new DeleteRequest('id');

        $client = $this->createHttpMockForDeleteRequest(
            $store,
            $request,
            'offers/id'
        );

        $service = new OffersService($client, 'secret');
        $service->delete($store, $request);
    }
}
