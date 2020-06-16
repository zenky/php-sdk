<?php

declare(strict_types=1);

namespace Zenky\DeliveryZones;

use Zenky\Api\AbstractApiService;
use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\Cities\Interfaces\CityInterface;
use Zenky\DeliveryZones\Interfaces\DeliveryZonesServiceInterface;
use Zenky\DeliveryZones\Interfaces\DeliveryZoneInterface;
use Zenky\DeliveryZones\Interfaces\Responses\PaginatedDeliveryZonesResponseInterface;
use Zenky\DeliveryZones\Responses\PaginatedDeliveryZonesResponse;
use Zenky\Stores\Interfaces\StoreInterface;

class DeliveryZonesService extends AbstractApiService implements DeliveryZonesServiceInterface
{
    public function create(StoreInterface $store, CityInterface $city, CreateRequestInterface $request): DeliveryZoneInterface
    {
        $request->setUrl('cities/'.$city->getId().'/delivery-zones');

        return $this->createEntity($store, $request, fn (array $data) => new DeliveryZone($data));
    }

    public function list(StoreInterface $store, CityInterface $city, ListRequestInterface $request): PaginatedDeliveryZonesResponseInterface
    {
        $request->setUrl('cities/'.$city->getId().'/delivery-zones');

        return $this->listEntities($store, $request, PaginatedDeliveryZonesResponse::class, fn (array $data) => new DeliveryZone($data));
    }

    public function show(StoreInterface $store, CityInterface $city, ShowRequestInterface $request): DeliveryZoneInterface
    {
        $request->setUrl('cities/'.$city->getId().'/delivery-zones/'.$request->getId());

        return $this->showEntity($store, $request, fn (array $data) => new DeliveryZone($data));
    }

    public function update(StoreInterface $store, CityInterface $city, UpdateRequestInterface $request): DeliveryZoneInterface
    {
        $request->setUrl('cities/'.$city->getId().'/delivery-zones/'.$request->getId());

        return $this->updateEntity($store, $request, fn (array $data) => new DeliveryZone($data));
    }

    public function delete(StoreInterface $store, CityInterface $city, DeleteRequestInterface $request): void
    {
        $request->setUrl('cities/'.$city->getId().'/delivery-zones/'.$request->getId());

        $this->deleteEntity($store, $request);
    }
}
