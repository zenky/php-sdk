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
use Zenky\Articles\Interfaces\ArticleInterface;
use Zenky\Articles\Interfaces\ArticlesServiceInterface;
use Zenky\Articles\Interfaces\Responses\PaginatedArticlesResponseInterface;
use Zenky\Articles\Responses\PaginatedArticlesResponse;
use Zenky\Stores\Interfaces\StoreInterface;

class ArticlesService extends AbstractApiService implements ArticlesServiceInterface
{
    protected function getRootUrl(StoreInterface $store, ApiRequestInterface $request): string
    {
        return 'articles';
    }

    public function create(StoreInterface $store, CreateRequestInterface $request): ArticleInterface
    {
        return $this->createEntity($store, $request, fn (array $data) => new Article($data));
    }

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedArticlesResponseInterface
    {
        return $this->listEntities($store, $request, PaginatedArticlesResponse::class, fn (array $data) => new Article($data));
    }

    public function show(StoreInterface $store, ShowRequestInterface $request): ArticleInterface
    {
        return $this->showEntity($store, $request, fn (array $data) => new Article($data));
    }

    public function update(StoreInterface $store, UpdateRequestInterface $request): ArticleInterface
    {
        return $this->updateEntity($store, $request, fn (array $data) => new Article($data));
    }

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void
    {
        $this->deleteEntity($store, $request);
    }
}
