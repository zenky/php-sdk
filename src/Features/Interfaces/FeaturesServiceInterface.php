<?php

declare(strict_types=1);

namespace Zenky\Features\Interfaces;

use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\Features\Interfaces\Responses\PaginatedFeaturesResponseInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface FeaturesServiceInterface
{
    public function create(StoreInterface $store, CreateRequestInterface $request): FeatureInterface;

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedFeaturesResponseInterface;

    public function show(StoreInterface $store, ShowRequestInterface $request): FeatureInterface;

    public function update(StoreInterface $store, UpdateRequestInterface $request): FeatureInterface;

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void;
}
