<?php

declare(strict_types=1);

namespace Zenky\SyncGates;

use GuzzleHttp\ClientInterface;
use Zenky\SyncGates\Interfaces\Responses\SyncGateResponseInterface;
use Zenky\SyncGates\Interfaces\SyncGateServiceInterface;
use Zenky\SyncGates\Responses\SyncGateResponse;

abstract class AbstractSyncGateService implements SyncGateServiceInterface
{
    private ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    abstract protected function getBaseUrl(string $token): string;

    public function synchronize(string $token, array $payload): SyncGateResponseInterface
    {
        $url = 'sync-gates/'.$token.'/'.$this->getBaseUrl($token);

        $response = $this->client->request('POST', $url, ['json' => $payload]);
        $data = json_decode((string) $response->getBody(), true);

        return new SyncGateResponse($data['data'] ?? []);
    }
}
