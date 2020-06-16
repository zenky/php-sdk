<?php

declare(strict_types=1);

namespace Zenky\SalesChannels\Interfaces;

use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\SalesChannels\Interfaces\Responses\PaginatedSalesChannelsResponseInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface SalesChannelsServiceInterface
{
    public function create(StoreInterface $store, CreateRequestInterface $request): SalesChannelInterface;

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedSalesChannelsResponseInterface;

    public function show(StoreInterface $store, ShowRequestInterface $request): SalesChannelInterface;

    public function update(StoreInterface $store, UpdateRequestInterface $request): SalesChannelInterface;

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void;
}
