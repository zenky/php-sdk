<?php

declare(strict_types=1);

namespace Zenky\SyncGates;

use GuzzleHttp\ClientInterface;
use Zenky\Api\Interfaces\ApiClientFactoryInterface;
use Zenky\SyncGates\Interfaces\Responses\SyncGateResponseInterface;
use Zenky\SyncGates\Interfaces\SyncGateServiceInterface;
use Zenky\SyncGates\Responses\SyncGateResponse;

abstract class AbstractSyncGateService implements SyncGateServiceInterface
{
    private ClientInterface $client;

    public function __construct(ApiClientFactoryInterface $factory)
    {
        $this->client = $factory->makeHttpClient();
    }

    abstract protected function getBaseUrl(string $token): string;

    public function synchronize(string $token, array $payload): SyncGateResponseInterface
    {
        $url = 'sync-gate/'.$token.'/'.$this->getBaseUrl($token);
        $response = $this->client->request('POST', $url, [
            'json' => [
                'payload' => $payload,
            ],
        ]);

        $data = json_decode((string) $response->getBody(), true);

        return new SyncGateResponse($data['data'] ?? []);
    }
}
