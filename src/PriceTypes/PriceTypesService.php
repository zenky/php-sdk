<?php

declare(strict_types=1);

namespace Zenky\PriceTypes;

use Zenky\Api\AbstractApiService;
use Zenky\Api\Interfaces\Requests\ApiRequestInterface;
use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\PriceTypes\Interfaces\PriceTypesServiceInterface;
use Zenky\PriceTypes\Interfaces\PriceTypeInterface;
use Zenky\PriceTypes\Interfaces\Responses\PaginatedPriceTypesResponseInterface;
use Zenky\PriceTypes\Responses\PaginatedPriceTypesResponse;
use Zenky\Stores\Interfaces\StoreInterface;

class PriceTypesService extends AbstractApiService implements PriceTypesServiceInterface
{
    protected function getRootUrl(StoreInterface $store, ApiRequestInterface $request): string
    {
        return 'price-types';
    }

    public function create(StoreInterface $store, CreateRequestInterface $request): PriceTypeInterface
    {
        return $this->createEntity($store, $request, fn (array $data) => new PriceType($data));
    }

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedPriceTypesResponseInterface
    {
        return $this->listEntities($store, $request, PaginatedPriceTypesResponse::class, fn (array $data) => new PriceType($data));
    }

    public function show(StoreInterface $store, ShowRequestInterface $request): PriceTypeInterface
    {
        return $this->showEntity($store, $request, fn (array $data) => new PriceType($data));
    }

    public function update(StoreInterface $store, UpdateRequestInterface $request): PriceTypeInterface
    {
        return $this->updateEntity($store, $request, fn (array $data) => new PriceType($data));
    }

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void
    {
        $this->deleteEntity($store, $request);
    }
}
