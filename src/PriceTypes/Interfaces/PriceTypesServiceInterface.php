<?php

declare(strict_types=1);

namespace Zenky\PriceTypes\Interfaces;

use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\PriceTypes\Interfaces\Responses\PaginatedPriceTypesResponseInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface PriceTypesServiceInterface
{
    public function create(StoreInterface $store, CreateRequestInterface $request): PriceTypeInterface;

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedPriceTypesResponseInterface;

    public function show(StoreInterface $store, ShowRequestInterface $request): PriceTypeInterface;

    public function update(StoreInterface $store, UpdateRequestInterface $request): PriceTypeInterface;

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void;
}
