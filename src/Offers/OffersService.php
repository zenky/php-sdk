<?php

declare(strict_types=1);

namespace Zenky\Offers;

use Zenky\Api\AbstractApiService;
use Zenky\Api\Interfaces\Requests\ApiRequestInterface;
use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\Offers\Interfaces\OffersServiceInterface;
use Zenky\Offers\Interfaces\OfferInterface;
use Zenky\Offers\Interfaces\Responses\PaginatedOffersResponseInterface;
use Zenky\Offers\Responses\PaginatedOffersResponse;
use Zenky\Stores\Interfaces\StoreInterface;

class OffersService extends AbstractApiService implements OffersServiceInterface
{
    protected function getRootUrl(StoreInterface $store, ApiRequestInterface $request): string
    {
        return 'offers';
    }

    public function create(StoreInterface $store, CreateRequestInterface $request): OfferInterface
    {
        return $this->createEntity($store, $request, fn (array $data) => new Offer($data));
    }

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedOffersResponseInterface
    {
        return $this->listEntities($store, $request, PaginatedOffersResponse::class, fn (array $data) => new Offer($data));
    }

    public function show(StoreInterface $store, ShowRequestInterface $request): OfferInterface
    {
        return $this->showEntity($store, $request, fn (array $data) => new Offer($data));
    }

    public function update(StoreInterface $store, UpdateRequestInterface $request): OfferInterface
    {
        return $this->updateEntity($store, $request, fn (array $data) => new Offer($data));
    }

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void
    {
        $this->deleteEntity($store, $request);
    }
}
