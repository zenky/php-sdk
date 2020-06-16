<?php

declare(strict_types=1);

namespace Zenky\Cities\Interfaces;

use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\Cities\Interfaces\Responses\PaginatedCitiesResponseInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface CitiesServiceInterface
{
    public function create(StoreInterface $store, CreateRequestInterface $request): CityInterface;

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedCitiesResponseInterface;

    public function show(StoreInterface $store, ShowRequestInterface $request): CityInterface;

    public function update(StoreInterface $store, UpdateRequestInterface $request): CityInterface;

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void;
}
