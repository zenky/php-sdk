<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\SyncGates;

use GuzzleHttp\ClientInterface;
use Zenky\Api\Entities\BasicApiClientFactory;
use Zenky\SyncGates\Interfaces\Responses\SyncGateResponseInterface;
use Zenky\SyncGates\ModifiersGroupsSyncGateService;
use Zenky\Tests\Fakes\FakeResponse;
use Zenky\Tests\TestCase;

class ModifiersGroupsSyncGateServiceTest extends TestCase
{
    public function testItShouldProvideResponse()
    {
        $client = \Mockery::mock(ClientInterface::class);
        $client->shouldReceive('request')
            ->with('POST', 'sync-gate/secret/modifiers-groups', [
                'json' => [
                    'payload' => [
                        ['id' => 1, 'name' => 'First', 'modifiers' => [['id' => 1, 'name' => 'First', 'price' => 100]]],
                        ['id' => 2, 'name' => 'Second', 'modifiers' => [['id' => 2, 'name' => 'Second', 'price' => 200]]],
                    ],
                ],
            ])
            ->andReturn(FakeResponse::syncGate());

        $service = new ModifiersGroupsSyncGateService(new BasicApiClientFactory($client));
        $response = $service->synchronize('secret', [
            ['id' => 1, 'name' => 'First', 'modifiers' => [['id' => 1, 'name' => 'First', 'price' => 100]]],
            ['id' => 2, 'name' => 'Second', 'modifiers' => [['id' => 2, 'name' => 'Second', 'price' => 200]]],
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
