<?php

declare(strict_types=1);

namespace Zenky\CardTokens;

use Zenky\Api\AbstractApiService;
use Zenky\Api\Interfaces\ProtectedServiceInterface;
use Zenky\Api\Interfaces\Requests\ApiRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\CardTokens\Interfaces\CardTokensServiceInterface;
use Zenky\CardTokens\Interfaces\CardTokenInterface;
use Zenky\CardTokens\Interfaces\Responses\PaginatedCardTokensResponseInterface;
use Zenky\CardTokens\Responses\PaginatedCardTokensResponse;
use Zenky\Stores\Interfaces\StoreInterface;

class CardTokensService extends AbstractApiService implements CardTokensServiceInterface, ProtectedServiceInterface
{
    protected function getRootUrl(StoreInterface $store, ApiRequestInterface $request): string
    {
        return 'profile/card-tokens';
    }

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedCardTokensResponseInterface
    {
        return $this->listEntities($store, $request, PaginatedCardTokensResponse::class, fn (array $data) => new CardToken($data));
    }

    public function show(StoreInterface $store, ShowRequestInterface $request): CardTokenInterface
    {
        return $this->showEntity($store, $request, fn (array $data) => new CardToken($data));
    }

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void
    {
        $this->deleteEntity($store, $request);
    }
}
