<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\SyncGates;

use GuzzleHttp\ClientInterface;
use Zenky\Api\Entities\BasicApiClientFactory;
use Zenky\SyncGates\Interfaces\Responses\SyncGateResponseInterface;
use Zenky\SyncGates\ModifiersSyncGateService;
use Zenky\Tests\Fakes\FakeResponse;
use Zenky\Tests\TestCase;

class ModifiersSyncGateServiceTest extends TestCase
{
    public function testItShouldProvideResponse()
    {
        $client = \Mockery::mock(ClientInterface::class);
        $client->shouldReceive('request')
            ->with('POST', 'sync-gate/secret/modifiers', [
                'json' => [
                    'payload' => [
                        ['id' => 1, 'name' => 'First', 'price' => null],
                        ['id' => 2, 'name' => 'Second', 'price' => 100],
                    ],
                ],
            ])
            ->andReturn(FakeResponse::syncGate());

        $service = new ModifiersSyncGateService(new BasicApiClientFactory($client));
        $response = $service->synchronize('secret', [
            ['id' => 1, 'name' => 'First', 'price' => null],
            ['id' => 2, 'name' => 'Second', 'price' => 100],
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
