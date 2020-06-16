<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\CardTokens;

use Zenky\Api\Requests\DeleteRequest;
use Zenky\Api\Requests\ListRequest;
use Zenky\Api\Requests\ShowRequest;
use Zenky\CardTokens\CardTokensService;
use Zenky\CardTokens\Interfaces\CardTokenInterface;
use Zenky\CardTokens\Interfaces\Responses\PaginatedCardTokensResponseInterface;
use Zenky\Tests\TestCase;

class CardTokensServiceTest extends TestCase
{
    public function testItShouldListCardTokens()
    {
        $store = $this->createStore();
        $request = new ListRequest();

        $client = $this->createHttpMockForListRequest(
            $store,
            $request,
            'profile/card-tokens',
            fn () => $this->createFakeResponseForEntitiesCollection(5, 'card-tokens/token.json')
        );

        $service = new CardTokensService($client, 'secret');
        $response = $service->list($store, $request);
        $this->assertInstanceOf(PaginatedCardTokensResponseInterface::class, $response);
        $this->assertSame(5, count($response->getItems()));

        foreach ($response->getItems() as $item) {
            $this->assertInstanceOf(CardTokenInterface::class, $item);
        }
    }

    public function testItShouldShowCardTokens()
    {
        $store = $this->createStore();
        $request = new ShowRequest('id');

        $client = $this->createHttpMockForShowRequest(
            $store,
            $request,
            'profile/card-tokens/id',
            fn () => $this->createFakeResponseForEntity('card-tokens/token.json')
        );

        $service = new CardTokensService($client, 'secret');
        $item = $service->show($store, $request);
        $this->assertInstanceOf(CardTokenInterface::class, $item);
    }

    public function testItShouldDeleteCardTokens()
    {
        $store = $this->createStore();
        $request = new DeleteRequest('id');

        $client = $this->createHttpMockForDeleteRequest(
            $store,
            $request,
            'profile/card-tokens/id'
        );

        $service = new CardTokensService($client, 'secret');
        $service->delete($store, $request);
    }
}
