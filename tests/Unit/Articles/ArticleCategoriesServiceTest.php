<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\Articles;

use Zenky\Api\Requests\CreateRequest;
use Zenky\Api\Requests\DeleteRequest;
use Zenky\Api\Requests\ListRequest;
use Zenky\Api\Requests\ShowRequest;
use Zenky\Api\Requests\UpdateRequest;
use Zenky\Articles\ArticleCategoriesService;
use Zenky\Articles\Interfaces\ArticleCategoryInterface;
use Zenky\Articles\Interfaces\Responses\PaginatedArticleCategoriesResponseInterface;
use Zenky\Tests\Fakes\FakeResponse;
use Zenky\Tests\TestCase;

class ArticleCategoriesServiceTest extends TestCase
{
    public function testItShouldCreateCategories()
    {
        $store = $this->createStore();
        $request = new CreateRequest([]);

        $client = $this->createHttpMockForCreateRequest(
            $store,
            $request,
            'article-categories',
            fn () => $this->createFakeResponseForEntity('articles/category.json')
        );

        $service = new ArticleCategoriesService($client, 'secret');
        $category = $service->create($store, $request);
        $this->assertInstanceOf(ArticleCategoryInterface::class, $category);
    }

    public function testItShouldListCategories()
    {
        $store = $this->createStore();
        $request = new ListRequest();

        $client = $this->createHttpMockForListRequest(
            $store,
            $request,
            'article-categories',
            fn () => $this->createFakeResponseForEntitiesCollection(5, 'articles/category.json')
        );

        $service = new ArticleCategoriesService($client, 'secret');
        $response = $service->list($store, $request);
        $this->assertInstanceOf(PaginatedArticleCategoriesResponseInterface::class, $response);
        $this->assertSame(5, count($response->getItems()));

        foreach ($response->getItems() as $item) {
            $this->assertInstanceOf(ArticleCategoryInterface::class, $item);
        }
    }

    public function testItShouldShowCategories()
    {
        $store = $this->createStore();
        $entity = $this->createEntity('articles/category.json');
        $request = new ShowRequest($entity['id']);

        $client = $this->createHttpMockForShowRequest(
            $store,
            $request,
            'article-categories/'.$entity['id'],
            fn () => FakeResponse::make(['data' => $entity])
        );

        $service = new ArticleCategoriesService($client, 'secret');
        $category = $service->show($store, $request);
        $this->assertInstanceOf(ArticleCategoryInterface::class, $category);
    }

    public function testItShouldUpdateCategories()
    {
        $store = $this->createStore();
        $entity = $this->createEntity('articles/category.json');
        $request = new UpdateRequest($entity['id'], []);

        $client = $this->createHttpMockForUpdateRequest(
            $store,
            $request,
            'article-categories/'.$entity['id'],
            fn () => FakeResponse::make(['data' => $entity])
        );

        $service = new ArticleCategoriesService($client, 'secret');
        $category = $service->update($store, $request);
        $this->assertInstanceOf(ArticleCategoryInterface::class, $category);
    }

    public function testItShouldDeleteCategories()
    {
        $store = $this->createStore();
        $entity = $this->createEntity('articles/category.json');
        $request = new DeleteRequest($entity['id']);

        $client = $this->createHttpMockForDeleteRequest($store, $request, 'article-categories/'.$entity['id']);
        $service = new ArticleCategoriesService($client, 'secret');
        $service->delete($store, $request);
    }
}
