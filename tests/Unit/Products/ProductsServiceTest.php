<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\Products;

use Zenky\Api\Requests\CreateRequest;
use Zenky\Api\Requests\DeleteRequest;
use Zenky\Api\Requests\ListRequest;
use Zenky\Api\Requests\ShowRequest;
use Zenky\Api\Requests\UpdateRequest;
use Zenky\Products\ProductsService;
use Zenky\Products\Interfaces\ProductInterface;
use Zenky\Products\Interfaces\Responses\PaginatedProductsResponseInterface;
use Zenky\Tests\TestCase;

class ProductsServiceTest extends TestCase
{
    public function testItShouldCreateProducts()
    {
        $store = $this->createStore();
        $request = new CreateRequest([]);

        $client = $this->createHttpMockForCreateRequest(
            $store,
            $request,
            'products',
            fn () => $this->createFakeResponseForEntity('products/product.json')
        );

        $service = new ProductsService($client, 'secret');
        $item = $service->create($store, $request);
        $this->assertInstanceOf(ProductInterface::class, $item);
    }

    public function testItShouldListProducts()
    {
        $store = $this->createStore();
        $request = new ListRequest();

        $client = $this->createHttpMockForListRequest(
            $store,
            $request,
            'products',
            fn () => $this->createFakeResponseForEntitiesCollection(5, 'products/product.json')
        );

        $service = new ProductsService($client, 'secret');
        $response = $service->list($store, $request);
        $this->assertInstanceOf(PaginatedProductsResponseInterface::class, $response);
        $this->assertSame(5, count($response->getItems()));

        foreach ($response->getItems() as $item) {
            $this->assertInstanceOf(ProductInterface::class, $item);
        }
    }

    public function testItShouldShowProducts()
    {
        $store = $this->createStore();
        $request = new ShowRequest('id');

        $client = $this->createHttpMockForShowRequest(
            $store,
            $request,
            'products/id',
            fn () => $this->createFakeResponseForEntity('products/product.json')
        );

        $service = new ProductsService($client, 'secret');
        $item = $service->show($store, $request);
        $this->assertInstanceOf(ProductInterface::class, $item);
    }

    public function testItShouldUpdateProducts()
    {
        $store = $this->createStore();
        $request = new UpdateRequest('id', []);

        $client = $this->createHttpMockForUpdateRequest(
            $store,
            $request,
            'products/id',
            fn () => $this->createFakeResponseForEntity('products/product.json')
        );

        $service = new ProductsService($client, 'secret');
        $item = $service->update($store, $request);
        $this->assertInstanceOf(ProductInterface::class, $item);
    }

    public function testItShouldDeleteProducts()
    {
        $store = $this->createStore();
        $request = new DeleteRequest('id');

        $client = $this->createHttpMockForDeleteRequest(
            $store,
            $request,
            'products/id'
        );

        $service = new ProductsService($client, 'secret');
        $service->delete($store, $request);
    }
}
