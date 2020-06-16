<?php

declare(strict_types=1);

namespace Zenky\Api\Traits;

use Zenky\Api\Interfaces\Requests\ApiRequestInterface;
use Zenky\Stores\Interfaces\StoreInterface;

trait GeneratesRequestParams
{
    protected function getRequestParams(?StoreInterface $store, ApiRequestInterface $request, array $payload = [], ?string $token = null): array
    {
        $params = [];

        if (!empty($query = $request->getQuery())) {
            $params['query'] = $query;
        }

        if (!is_null($payload)) {
            $params['json'] = $payload;
        }

        if (!is_null($headers = $this->getHeaders($store, $request, $token))) {
            $params['headers'] = $headers;
        }

        return $params;
    }

    private function getHeaders(?StoreInterface $store, ApiRequestInterface $request, ?string $token): ?array
    {
        $headers = [];

        if (!is_null($token)) {
            $headers['Authorization'] = 'Bearer '.$token;
        }

        if (!is_null($store)) {
            $headers['X-Store-Id'] = $store->getId();
        }

        if (!is_null($request->getTimezone())) {
            $headers['X-Timezone'] = $request->getTimezone();
        }

        return empty($headers) ? null : $headers;
    }
}
