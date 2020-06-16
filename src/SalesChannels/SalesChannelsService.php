<?php

declare(strict_types=1);

namespace Zenky\SalesChannels;

use Zenky\Api\AbstractApiService;
use Zenky\Api\Interfaces\Requests\ApiRequestInterface;
use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\SalesChannels\Interfaces\SalesChannelsServiceInterface;
use Zenky\SalesChannels\Interfaces\SalesChannelInterface;
use Zenky\SalesChannels\Interfaces\Responses\PaginatedSalesChannelsResponseInterface;
use Zenky\SalesChannels\Responses\PaginatedSalesChannelsResponse;
use Zenky\Stores\Interfaces\StoreInterface;

class SalesChannelsService extends AbstractApiService implements SalesChannelsServiceInterface
{
    protected function getRootUrl(StoreInterface $store, ApiRequestInterface $request): string
    {
        return 'sales-channels';
    }

    public function create(StoreInterface $store, CreateRequestInterface $request): SalesChannelInterface
    {
        return $this->createEntity($store, $request, fn (array $data) => new SalesChannel($data));
    }

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedSalesChannelsResponseInterface
    {
        return $this->listEntities($store, $request, PaginatedSalesChannelsResponse::class, fn (array $data) => new SalesChannel($data));
    }

    public function show(StoreInterface $store, ShowRequestInterface $request): SalesChannelInterface
    {
        return $this->showEntity($store, $request, fn (array $data) => new SalesChannel($data));
    }

    public function update(StoreInterface $store, UpdateRequestInterface $request): SalesChannelInterface
    {
        return $this->updateEntity($store, $request, fn (array $data) => new SalesChannel($data));
    }

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void
    {
        $this->deleteEntity($store, $request);
    }
}
