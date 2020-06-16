<?php

declare(strict_types=1);

namespace Zenky\Cities;

use Zenky\Api\AbstractApiService;
use Zenky\Api\Interfaces\Requests\ApiRequestInterface;
use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\Cities\Interfaces\CitiesServiceInterface;
use Zenky\Cities\Interfaces\CityInterface;
use Zenky\Cities\Interfaces\Responses\PaginatedCitiesResponseInterface;
use Zenky\Cities\Responses\PaginatedCitiesResponse;
use Zenky\Stores\Interfaces\StoreInterface;

class CitiesService extends AbstractApiService implements CitiesServiceInterface
{
    protected function getRootUrl(StoreInterface $store, ApiRequestInterface $request): string
    {
        return 'cities';
    }

    public function create(StoreInterface $store, CreateRequestInterface $request): CityInterface
    {
        return $this->createEntity($store, $request, fn (array $data) => new City($data));
    }

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedCitiesResponseInterface
    {
        return $this->listEntities($store, $request, PaginatedCitiesResponse::class, fn (array $data) => new City($data));
    }

    public function show(StoreInterface $store, ShowRequestInterface $request): CityInterface
    {
        return $this->showEntity($store, $request, fn (array $data) => new City($data));
    }

    public function update(StoreInterface $store, UpdateRequestInterface $request): CityInterface
    {
        return $this->updateEntity($store, $request, fn (array $data) => new City($data));
    }

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void
    {
        $this->deleteEntity($store, $request);
    }
}
