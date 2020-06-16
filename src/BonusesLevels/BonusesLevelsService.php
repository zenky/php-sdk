<?php

declare(strict_types=1);

namespace Zenky\BonusesLevels;

use Zenky\Api\AbstractApiService;
use Zenky\Api\Interfaces\Requests\ApiRequestInterface;
use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\BonusesLevels\Interfaces\BonusesLevelsServiceInterface;
use Zenky\BonusesLevels\Interfaces\BonusesLevelInterface;
use Zenky\BonusesLevels\Interfaces\Responses\PaginatedBonusesLevelsResponseInterface;
use Zenky\BonusesLevels\Responses\PaginatedBonusesLevelsResponse;
use Zenky\Stores\Interfaces\StoreInterface;

class BonusesLevelsService extends AbstractApiService implements BonusesLevelsServiceInterface
{
    protected function getRootUrl(StoreInterface $store, ApiRequestInterface $request): string
    {
        return 'loyalty/bonuses-levels';
    }

    public function create(StoreInterface $store, CreateRequestInterface $request): BonusesLevelInterface
    {
        return $this->createEntity($store, $request, fn (array $data) => new BonusesLevel($data));
    }

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedBonusesLevelsResponseInterface
    {
        return $this->listEntities(
            $store,
            $request,
            PaginatedBonusesLevelsResponse::class,
            fn (array $data) => new BonusesLevel($data)
        );
    }

    public function show(StoreInterface $store, ShowRequestInterface $request): BonusesLevelInterface
    {
        return $this->showEntity($store, $request, fn (array $data) => new BonusesLevel($data));
    }

    public function update(StoreInterface $store, UpdateRequestInterface $request): BonusesLevelInterface
    {
        return $this->updateEntity($store, $request, fn (array $data) => new BonusesLevel($data));
    }

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void
    {
        $this->deleteEntity($store, $request);
    }
}
