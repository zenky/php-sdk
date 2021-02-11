<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\SyncGates;

use GuzzleHttp\ClientInterface;
use Zenky\Api\Entities\BasicApiClientFactory;
use Zenky\SyncGates\Interfaces\Responses\SyncGateResponseInterface;
use Zenky\SyncGates\ProductRemaindersSyncGateService;
use Zenky\Tests\Fakes\FakeResponse;
use Zenky\Tests\TestCase;

class ProductRemaindersSyncGateServiceTest extends TestCase
{
    public function testItShouldProvideResponse()
    {
        $client = \Mockery::mock(ClientInterface::class);
        $client->shouldReceive('request')
            ->with('POST', 'sync-gate/secret/products/remainders', [
                'json' => [
                    'payload' => [
                        ['id' => 1, 'quantity' => 5],
                        ['id' => 2, 'quantity' => '2'],
                    ],
                ],
            ])
            ->andReturn(FakeResponse::syncGate());

        $service = new ProductRemaindersSyncGateService(new BasicApiClientFactory($client));
        $response = $service->synchronize('secret', [
            ['id' => 1, 'quantity' => 5],
            ['id' => 2, 'quantity' => '2'],
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
