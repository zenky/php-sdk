<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\SyncGates;

use GuzzleHttp\ClientInterface;
use Zenky\SyncGates\Interfaces\Responses\SyncGateResponseInterface;
use Zenky\SyncGates\StocksSyncGateService;
use Zenky\Tests\Fakes\FakeResponse;
use Zenky\Tests\TestCase;

class StocksSyncGateServiceTest extends TestCase
{
    public function testItShouldProvideResponse()
    {
        $client = \Mockery::mock(ClientInterface::class);
        $client->shouldReceive('request')
            ->with('POST', 'sync-gates/secret/stocks', [
                'json' => [
                    ['id' => 1, 'name' => 'First'],
                    ['id' => 2, 'name' => 'Second'],
                ],
            ])
            ->andReturn(
                FakeResponse::make([
                    'data' => [
                        'count' => 2,
                        'created_count' => 2,
                        'existed_count' => 0,
                        'updated_count' => 0,
                        'deleted_count' => 0,
                        'sync_identifier' => 'testing',
                    ],
                ])
            );

        $service = new StocksSyncGateService($client);
        $response = $service->synchronize('secret', [
            ['id' => 1, 'name' => 'First'],
            ['id' => 2, 'name' => 'Second'],
        ]);
        $this->assertInstanceOf(SyncGateResponseInterface::class, $response);
        $this->assertSame('testing', $response->getId());
        $this->assertFalse($response->wasQueued());
        $this->assertSame(2, $response->getCount());
        $this->assertSame(2, $response->getCreatedCount());
        $this->assertSame(0, $response->getUpdatedCount());
        $this->assertSame(0, $response->getDeletedCount());
    }
}
