<?php

declare(strict_types=1);

namespace Zenky\Api\Traits;

use Zenky\Api\Interfaces\Requests\ApiRequestInterface;
use Zenky\Stores\Interfaces\StoreInterface;

trait GeneratesRequestParams
{
    protected function getRequestParams(?StoreInterface $store, ApiRequestInterface $request, ?array $payload = null, ?string $token = null): array
    {
        $params = [
            'query' => $request->getQuery(),
            'json' => $payload,
            'headers' => $this->getHeaders($request, $store, $token),
        ];

        return array_filter($params, fn ($value) => !is_null($value) && !empty($value));
    }

    private function getHeaders(ApiRequestInterface $request, ?StoreInterface $store, ?string $token): ?array
    {
        $headers = [
            'Authorization' => !is_null($token) ? 'Bearer '.$token : null,
            'X-Store-Id' => !is_null($store) ? $store->getId() : null,
            'X-Timezone' => $request->getTimezone(),
            'X-Locale' => $request->getLocale(),
        ];

        return array_filter(
            array_merge($headers, $request->getHeaders()),
            fn ($value) => !is_null($value) && !empty($value)
        );
    }
}
