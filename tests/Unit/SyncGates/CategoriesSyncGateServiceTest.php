<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\SyncGates;

use GuzzleHttp\ClientInterface;
use Zenky\Api\Entities\BasicApiClientFactory;
use Zenky\SyncGates\CategoriesSyncGateService;
use Zenky\SyncGates\Interfaces\Responses\SyncGateResponseInterface;
use Zenky\Tests\Fakes\FakeResponse;
use Zenky\Tests\TestCase;

class CategoriesSyncGateServiceTest extends TestCase
{
    public function testItShouldProvideResponse()
    {
        $client = \Mockery::mock(ClientInterface::class);
        $client->shouldReceive('request')
            ->with('POST', 'sync-gate/secret/categories', [
                'json' => [
                    'payload' => [
                        ['id' => 1, 'name' => 'First'],
                        ['id' => 2, 'name' => 'Second'],
                    ],
                ],
            ])
            ->andReturn(FakeResponse::syncGate());

        $service = new CategoriesSyncGateService(new BasicApiClientFactory($client));
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
