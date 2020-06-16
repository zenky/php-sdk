<?php

declare(strict_types=1);

namespace Zenky\VariantOptions\Interfaces;

use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\VariantOptions\Interfaces\Responses\PaginatedVariantOptionsResponseInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface VariantOptionsServiceInterface
{
    public function create(StoreInterface $store, CreateRequestInterface $request): VariantOptionInterface;

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedVariantOptionsResponseInterface;

    public function show(StoreInterface $store, ShowRequestInterface $request): VariantOptionInterface;

    public function update(StoreInterface $store, UpdateRequestInterface $request): VariantOptionInterface;

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void;
}
