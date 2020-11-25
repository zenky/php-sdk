<?php

declare(strict_types=1);

namespace Zenky\Api\Entities;

use GuzzleHttp\ClientInterface;
use Zenky\Api\Interfaces\ApiClientFactoryInterface;

class BasicApiClientFactory implements ApiClientFactoryInterface
{
    private ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function makeHttpClient(): ClientInterface
    {
        return $this->client;
    }
}
