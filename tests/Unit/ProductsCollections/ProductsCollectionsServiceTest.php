<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\ProductsCollections;

use Zenky\Api\Requests\CreateRequest;
use Zenky\Api\Requests\DeleteRequest;
use Zenky\Api\Requests\ListRequest;
use Zenky\Api\Requests\ShowRequest;
use Zenky\Api\Requests\UpdateRequest;
use Zenky\ProductsCollections\ProductsCollectionsService;
use Zenky\ProductsCollections\Interfaces\ProductsCollectionInterface;
use Zenky\ProductsCollections\Interfaces\Responses\PaginatedProductsCollectionsResponseInterface;
use Zenky\Tests\TestCase;

class ProductsCollectionsServiceTest extends TestCase
{
    public function testItShouldCreateProductsCollections()
    {
        $store = $this->createStore();
        $request = new CreateRequest([]);

        $client = $this->createHttpMockForCreateRequest(
            $store,
            $request,
            'products-collections',
            fn () => $this->createFakeResponseForEntity('products-collections/collection.json')
        );

        $service = new ProductsCollectionsService($client, 'secret');
        $item = $service->create($store, $request);
        $this->assertInstanceOf(ProductsCollectionInterface::class, $item);
    }

    public function testItShouldListProductsCollections()
    {
        $store = $this->createStore();
        $request = new ListRequest();

        $client = $this->createHttpMockForListRequest(
            $store,
            $request,
            'products-collections',
            fn () => $this->createFakeResponseForEntitiesCollection(5, 'products-collections/collection.json')
        );

        $service = new ProductsCollectionsService($client, 'secret');
        $response = $service->list($store, $request);
        $this->assertInstanceOf(PaginatedProductsCollectionsResponseInterface::class, $response);
        $this->assertSame(5, count($response->getItems()));

        foreach ($response->getItems() as $item) {
            $this->assertInstanceOf(ProductsCollectionInterface::class, $item);
        }
    }

    public function testItShouldShowProductsCollections()
    {
        $store = $this->createStore();
        $request = new ShowRequest('id');

        $client = $this->createHttpMockForShowRequest(
            $store,
            $request,
            'products-collections/id',
            fn () => $this->createFakeResponseForEntity('products-collections/collection.json')
        );

        $service = new ProductsCollectionsService($client, 'secret');
        $item = $service->show($store, $request);
        $this->assertInstanceOf(ProductsCollectionInterface::class, $item);
    }

    public function testItShouldUpdateProductsCollections()
    {
        $store = $this->createStore();
        $request = new UpdateRequest('id', []);

        $client = $this->createHttpMockForUpdateRequest(
            $store,
            $request,
            'products-collections/id',
            fn () => $this->createFakeResponseForEntity('products-collections/collection.json')
        );

        $service = new ProductsCollectionsService($client, 'secret');
        $item = $service->update($store, $request);
        $this->assertInstanceOf(ProductsCollectionInterface::class, $item);
    }

    public function testItShouldDeleteProductsCollections()
    {
        $store = $this->createStore();
        $request = new DeleteRequest('id');

        $client = $this->createHttpMockForDeleteRequest(
            $store,
            $request,
            'products-collections/id'
        );

        $service = new ProductsCollectionsService($client, 'secret');
        $service->delete($store, $request);
    }
}
