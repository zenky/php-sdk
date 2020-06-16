<?php

declare(strict_types=1);

namespace Zenky\DeliveryZones\Interfaces;

use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\Cities\Interfaces\CityInterface;
use Zenky\DeliveryZones\Interfaces\Responses\PaginatedDeliveryZonesResponseInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface DeliveryZonesServiceInterface
{
    public function create(StoreInterface $store, CityInterface $city, CreateRequestInterface $request): DeliveryZoneInterface;

    public function list(StoreInterface $store, CityInterface $city, ListRequestInterface $request): PaginatedDeliveryZonesResponseInterface;

    public function show(StoreInterface $store, CityInterface $city, ShowRequestInterface $request): DeliveryZoneInterface;

    public function update(StoreInterface $store, CityInterface $city, UpdateRequestInterface $request): DeliveryZoneInterface;

    public function delete(StoreInterface $store, CityInterface $city, DeleteRequestInterface $request): void;
}
