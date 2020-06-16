<?php

declare(strict_types=1);

namespace Zenky\CardTokens\Interfaces;

use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\CardTokens\Interfaces\Responses\PaginatedCardTokensResponseInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface CardTokensServiceInterface
{
    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedCardTokensResponseInterface;

    public function show(StoreInterface $store, ShowRequestInterface $request): CardTokenInterface;

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void;
}
