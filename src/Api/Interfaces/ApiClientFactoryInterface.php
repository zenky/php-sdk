<?php

declare(strict_types=1);

namespace Zenky\Api\Interfaces;

use GuzzleHttp\ClientInterface;

interface ApiClientFactoryInterface
{
    public function makeHttpClient(): ClientInterface;
}
