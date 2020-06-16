<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\Categories;

use Zenky\Api\Requests\CreateRequest;
use Zenky\Api\Requests\DeleteRequest;
use Zenky\Api\Requests\ListRequest;
use Zenky\Api\Requests\ShowRequest;
use Zenky\Api\Requests\UpdateRequest;
use Zenky\Categories\CategoriesService;
use Zenky\Categories\Interfaces\CategoryInterface;
use Zenky\Categories\Interfaces\Responses\PaginatedCategoriesResponseInterface;
use Zenky\Tests\Fakes\FakeResponse;
use Zenky\Tests\TestCase;

class CategoriesServiceTest extends TestCase
{
    public function testItShouldCreateCategories()
    {
        $store = $this->createStore();
        $request = new CreateRequest([]);

        $client = $this->createHttpMockForCreateRequest(
            $store,
            $request,
            'categories',
            fn () => $this->createFakeResponseForEntity('categories/category.json')
        );

        $service = new CategoriesService($client, 'secret');
        $category = $service->create($store, $request);
        $this->assertInstanceOf(CategoryInterface::class, $category);
    }

    public function testItShouldListCategories()
    {
        $store = $this->createStore();
        $request = new ListRequest();

        $client = $this->createHttpMockForListRequest(
            $store,
            $request,
            'categories',
            fn () => $this->createFakeResponseForEntitiesCollection(5, 'categories/category.json')
        );

        $service = new CategoriesService($client, 'secret');
        $response = $service->list($store, $request);
        $this->assertInstanceOf(PaginatedCategoriesResponseInterface::class, $response);
        $this->assertSame(5, count($response->getItems()));

        foreach ($response->getItems() as $item) {
            $this->assertInstanceOf(CategoryInterface::class, $item);
        }
    }

    public function testItShouldShowCategories()
    {
        $store = $this->createStore();
        $entity = $this->createEntity('categories/category.json');
        $request = new ShowRequest($entity['id']);

        $client = $this->createHttpMockForShowRequest(
            $store,
            $request,
            'categories/'.$entity['id'],
            fn () => FakeResponse::make(['data' => $entity])
        );

        $service = new CategoriesService($client, 'secret');
        $category = $service->show($store, $request);
        $this->assertInstanceOf(CategoryInterface::class, $category);
    }

    public function testItShouldUpdateCategories()
    {
        $store = $this->createStore();
        $entity = $this->createEntity('categories/category.json');
        $request = new UpdateRequest($entity['id'], []);

        $client = $this->createHttpMockForUpdateRequest(
            $store,
            $request,
            'categories/'.$entity['id'],
            fn () => FakeResponse::make(['data' => $entity])
        );

        $service = new CategoriesService($client, 'secret');
        $category = $service->update($store, $request);
        $this->assertInstanceOf(CategoryInterface::class, $category);
    }

    public function testItShouldDeleteCategories()
    {
        $store = $this->createStore();
        $entity = $this->createEntity('categories/category.json');
        $request = new DeleteRequest($entity['id']);

        $client = $this->createHttpMockForDeleteRequest($store, $request, 'categories/'.$entity['id']);
        $service = new CategoriesService($client, 'secret');
        $service->delete($store, $request);
    }
}
