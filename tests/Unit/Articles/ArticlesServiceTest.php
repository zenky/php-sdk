<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\Articles;

use Zenky\Api\Requests\CreateRequest;
use Zenky\Api\Requests\DeleteRequest;
use Zenky\Api\Requests\ListRequest;
use Zenky\Api\Requests\ShowRequest;
use Zenky\Api\Requests\UpdateRequest;
use Zenky\Articles\ArticlesService;
use Zenky\Articles\Interfaces\ArticleInterface;
use Zenky\Articles\Interfaces\Responses\PaginatedArticlesResponseInterface;
use Zenky\Tests\Fakes\FakeResponse;
use Zenky\Tests\TestCase;

class ArticlesServiceTest extends TestCase
{
    public function testItShouldCreateArticles()
    {
        $store = $this->createStore();
        $request = new CreateRequest([]);

        $client = $this->createHttpMockForCreateRequest(
            $store,
            $request,
            'articles',
            fn () => $this->createFakeResponseForEntity('articles/article.json')
        );

        $service = new ArticlesService($client, 'secret');
        $artcle = $service->create($store, $request);
        $this->assertInstanceOf(ArticleInterface::class, $artcle);
    }

    public function testItShouldListArticles()
    {
        $store = $this->createStore();
        $request = new ListRequest();

        $client = $this->createHttpMockForListRequest(
            $store,
            $request,
            'articles',
            fn () => $this->createFakeResponseForEntitiesCollection(5, 'articles/article.json')
        );

        $service = new ArticlesService($client, 'secret');
        $response = $service->list($store, $request);
        $this->assertInstanceOf(PaginatedArticlesResponseInterface::class, $response);
        $this->assertIsArray($response->getItems());
        $this->assertSame(5, count($response->getItems()));

        foreach ($response->getItems() as $item) {
            $this->assertInstanceOf(ArticleInterface::class, $item);
        }
    }

    public function testItShouldShowArticle()
    {
        $store = $this->createStore();
        $entity = $this->createEntity('articles/article.json');
        $request = new ShowRequest($entity['id']);

        $client = $this->createHttpMockForShowRequest(
            $store,
            $request,
            'articles/'.$request->getId(),
            fn () => FakeResponse::make(['data' => $entity])
        );

        $service = new ArticlesService($client, 'secret');
        $article = $service->show($store, $request);
        $this->assertInstanceOf(ArticleInterface::class, $article);
    }

    public function testItShouldUpdateArticles()
    {
        $store = $this->createStore();
        $entity = $this->createEntity('articles/article.json');
        $request = new UpdateRequest($entity['id'], []);

        $client = $this->createHttpMockForUpdateRequest(
            $store,
            $request,
            'articles/'.$entity['id'],
            fn () => FakeResponse::make(['data' => $entity])
        );

        $service = new ArticlesService($client, 'secret');
        $artcle = $service->update($store, $request);
        $this->assertInstanceOf(ArticleInterface::class, $artcle);
    }

    public function testItShouldDeleteArticles()
    {
        $store = $this->createStore();
        $entity = $this->createEntity('articles/article.json');
        $request = new DeleteRequest($entity['id']);

        $client = $this->createHttpMockForDeleteRequest($store, $request, 'articles/'.$entity['id']);

        $service = new ArticlesService($client, 'secret');
        $service->delete($store, $request);
    }
}
