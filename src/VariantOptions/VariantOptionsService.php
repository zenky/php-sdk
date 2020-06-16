<?php

declare(strict_types=1);

namespace Zenky\VariantOptions;

use Zenky\Api\AbstractApiService;
use Zenky\Api\Interfaces\Requests\ApiRequestInterface;
use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\VariantOptions\Interfaces\VariantOptionsServiceInterface;
use Zenky\VariantOptions\Interfaces\VariantOptionInterface;
use Zenky\VariantOptions\Interfaces\Responses\PaginatedVariantOptionsResponseInterface;
use Zenky\VariantOptions\Responses\PaginatedVariantOptionsResponse;
use Zenky\Stores\Interfaces\StoreInterface;

class VariantOptionsService extends AbstractApiService implements VariantOptionsServiceInterface
{
    protected function getRootUrl(StoreInterface $store, ApiRequestInterface $request): string
    {
        return 'variant-options';
    }

    public function create(StoreInterface $store, CreateRequestInterface $request): VariantOptionInterface
    {
        return $this->createEntity($store, $request, fn (array $data) => new VariantOption($data));
    }

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedVariantOptionsResponseInterface
    {
        return $this->listEntities($store, $request, PaginatedVariantOptionsResponse::class, fn (array $data) => new VariantOption($data));
    }

    public function show(StoreInterface $store, ShowRequestInterface $request): VariantOptionInterface
    {
        return $this->showEntity($store, $request, fn (array $data) => new VariantOption($data));
    }

    public function update(StoreInterface $store, UpdateRequestInterface $request): VariantOptionInterface
    {
        return $this->updateEntity($store, $request, fn (array $data) => new VariantOption($data));
    }

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void
    {
        $this->deleteEntity($store, $request);
    }
}
