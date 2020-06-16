<?php

declare(strict_types=1);

namespace Zenky\Offers\Interfaces;

use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\Offers\Interfaces\Responses\PaginatedOffersResponseInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface OffersServiceInterface
{
    public function create(StoreInterface $store, CreateRequestInterface $request): OfferInterface;

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedOffersResponseInterface;

    public function show(StoreInterface $store, ShowRequestInterface $request): OfferInterface;

    public function update(StoreInterface $store, UpdateRequestInterface $request): OfferInterface;

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void;
}
