<?php

declare(strict_types=1);

namespace Zenky\BonusesLevels\Interfaces;

use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\BonusesLevels\Interfaces\Responses\PaginatedBonusesLevelsResponseInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface BonusesLevelsServiceInterface
{
    public function create(StoreInterface $store, CreateRequestInterface $request): BonusesLevelInterface;

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedBonusesLevelsResponseInterface;

    public function show(StoreInterface $store, ShowRequestInterface $request): BonusesLevelInterface;

    public function update(StoreInterface $store, UpdateRequestInterface $request): BonusesLevelInterface;

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void;
}
