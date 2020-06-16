<?php

declare(strict_types=1);

namespace Zenky\Articles;

use Zenky\Api\AbstractApiService;
use Zenky\Api\Interfaces\Requests\ApiRequestInterface;
use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\Articles\Interfaces\ArticleCategoriesServiceInterface;
use Zenky\Articles\Interfaces\ArticleCategoryInterface;
use Zenky\Articles\Responses\PaginatedArticleCategoriesResponse;
use Zenky\Stores\Interfaces\StoreInterface;

class ArticleCategoriesService extends AbstractApiService implements ArticleCategoriesServiceInterface
{
    protected function getRootUrl(StoreInterface $store, ApiRequestInterface $request): string
    {
        return 'article-categories';
    }

    public function create(StoreInterface $store, CreateRequestInterface $request): ArticleCategoryInterface
    {
        return $this->createEntity($store, $request, fn (array $data) => new ArticleCategory($data));
    }

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedResponseInterface
    {
        return $this->listEntities(
            $store,
            $request,
            PaginatedArticleCategoriesResponse::class,
            fn (array $data) => new ArticleCategory($data)
        );
    }

    public function show(StoreInterface $store, ShowRequestInterface $request): ArticleCategoryInterface
    {
        return $this->showEntity($store, $request, fn (array $data) => new ArticleCategory($data));
    }

    public function update(StoreInterface $store, UpdateRequestInterface $request): ArticleCategoryInterface
    {
        return $this->updateEntity($store, $request, fn (array $data) => new ArticleCategory($data));
    }

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void
    {
        $this->deleteEntity($store, $request);
    }
}
