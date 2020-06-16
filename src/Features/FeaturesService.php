<?php

declare(strict_types=1);

namespace Zenky\Features;

use Zenky\Api\AbstractApiService;
use Zenky\Api\Interfaces\Requests\ApiRequestInterface;
use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\Features\Interfaces\FeaturesServiceInterface;
use Zenky\Features\Interfaces\FeatureInterface;
use Zenky\Features\Interfaces\Responses\PaginatedFeaturesResponseInterface;
use Zenky\Features\Responses\PaginatedFeaturesResponse;
use Zenky\Stores\Interfaces\StoreInterface;

class FeaturesService extends AbstractApiService implements FeaturesServiceInterface
{
    protected function getRootUrl(StoreInterface $store, ApiRequestInterface $request): string
    {
        return 'features';
    }

    public function create(StoreInterface $store, CreateRequestInterface $request): FeatureInterface
    {
        return $this->createEntity($store, $request, fn (array $data) => new Feature($data));
    }

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedFeaturesResponseInterface
    {
        return $this->listEntities($store, $request, PaginatedFeaturesResponse::class, fn (array $data) => new Feature($data));
    }

    public function show(StoreInterface $store, ShowRequestInterface $request): FeatureInterface
    {
        return $this->showEntity($store, $request, fn (array $data) => new Feature($data));
    }

    public function update(StoreInterface $store, UpdateRequestInterface $request): FeatureInterface
    {
        return $this->updateEntity($store, $request, fn (array $data) => new Feature($data));
    }

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void
    {
        $this->deleteEntity($store, $request);
    }
}
