<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\BonusesLevels;

use Zenky\Api\Requests\CreateRequest;
use Zenky\Api\Requests\DeleteRequest;
use Zenky\Api\Requests\ListRequest;
use Zenky\Api\Requests\ShowRequest;
use Zenky\Api\Requests\UpdateRequest;
use Zenky\BonusesLevels\BonusesLevelsService;
use Zenky\BonusesLevels\Interfaces\BonusesLevelInterface;
use Zenky\BonusesLevels\Interfaces\Responses\PaginatedBonusesLevelsResponseInterface;
use Zenky\Tests\TestCase;

class BonusesLevelsServiceTest extends TestCase
{
    public function testItShouldCreateBonusesLevels()
    {
        $store = $this->createStore();
        $request = new CreateRequest([]);

        $client = $this->createHttpMockForCreateRequest(
            $store,
            $request,
            'loyalty/bonuses-levels',
            fn () => $this->createFakeResponseForEntity('bonuses-levels/level.json')
        );

        $service = new BonusesLevelsService($client, 'secret');
        $item = $service->create($store, $request);
        $this->assertInstanceOf(BonusesLevelInterface::class, $item);
    }

    public function testItShouldListBonusesLevels()
    {
        $store = $this->createStore();
        $request = new ListRequest();

        $client = $this->createHttpMockForListRequest(
            $store,
            $request,
            'loyalty/bonuses-levels',
            fn () => $this->createFakeResponseForEntitiesCollection(5, 'bonuses-levels/level.json')
        );

        $service = new BonusesLevelsService($client, 'secret');
        $response = $service->list($store, $request);
        $this->assertInstanceOf(PaginatedBonusesLevelsResponseInterface::class, $response);
        $this->assertSame(5, count($response->getItems()));

        foreach ($response->getItems() as $item) {
            $this->assertInstanceOf(BonusesLevelInterface::class, $item);
        }
    }

    public function testItShouldShowBonusesLevels()
    {
        $store = $this->createStore();
        $request = new ShowRequest('id');

        $client = $this->createHttpMockForShowRequest(
            $store,
            $request,
            'loyalty/bonuses-levels/id',
            fn () => $this->createFakeResponseForEntity('bonuses-levels/level.json')
        );

        $service = new BonusesLevelsService($client, 'secret');
        $item = $service->show($store, $request);
        $this->assertInstanceOf(BonusesLevelInterface::class, $item);
    }

    public function testItShouldUpdateBonusesLevels()
    {
        $store = $this->createStore();
        $request = new UpdateRequest('id', []);

        $client = $this->createHttpMockForUpdateRequest(
            $store,
            $request,
            'loyalty/bonuses-levels/id',
            fn () => $this->createFakeResponseForEntity('bonuses-levels/level.json')
        );

        $service = new BonusesLevelsService($client, 'secret');
        $item = $service->update($store, $request);
        $this->assertInstanceOf(BonusesLevelInterface::class, $item);
    }

    public function testItShouldDeleteBonusesLevels()
    {
        $store = $this->createStore();
        $request = new DeleteRequest('id');

        $client = $this->createHttpMockForDeleteRequest(
            $store,
            $request,
            'loyalty/bonuses-levels/id'
        );

        $service = new BonusesLevelsService($client, 'secret');
        $service->delete($store, $request);
    }
}
