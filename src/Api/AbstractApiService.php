<?php

declare(strict_types=1);

namespace Zenky\Api;

use GuzzleHttp\ClientInterface;
use Zenky\Api\Interfaces\ApiClientFactoryInterface;
use Zenky\Api\Interfaces\ProtectedServiceInterface;
use Zenky\Api\Interfaces\Requests\ApiRequestInterface;
use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\Api\Traits\GeneratesRequestParams;
use Zenky\Stores\Interfaces\StoreInterface;

abstract class AbstractApiService
{
    use GeneratesRequestParams;

    private ClientInterface $client;
    private ?string $token;

    public function __construct(ApiClientFactoryInterface $apiClient, ?string $token = null)
    {
        if ($this instanceof ProtectedServiceInterface && is_null($token)) {
            throw new \RuntimeException('API token required for this protected API Service.');
        }

        $this->client = $apiClient->makeHttpClient();
        $this->token = $token;
    }

    protected function getRootUrl(StoreInterface $store, ApiRequestInterface $request): string
    {
        throw new \RuntimeException(
            'You must specify URL in given ApiRequestInterface or override AbstractApiService::getRootUrl() method.'
        );
    }

    protected function createEntity(StoreInterface $store, CreateRequestInterface $request, callable $mapper)
    {
        $response = $this->client->request(
            $request->getMethod() ?? 'POST',
            $request->getUrl() ?? $this->getRootUrl($store, $request),
            $this->getRequestParams($store, $request, $request->getPayload(), $this->token)
        );

        $data = json_decode((string) $response->getBody(), true);

        return call_user_func_array($mapper, [$data['data']]);
    }

    protected function listEntities(StoreInterface $store, ListRequestInterface $request, string $responseClass, callable $mapper)
    {
        $response = $this->client->request(
            $request->getMethod() ?? 'GET',
            $request->getUrl() ?? $this->getRootUrl($store, $request),
            $this->getRequestParams($store, $request, [], $this->token)
        );

        $data = json_decode((string) $response->getBody(), true);

        return new $responseClass([
            'items' => array_map($mapper, $data['data'] ?? []),
            'pagination' => $data['meta']['pagination'] ?? null,
        ]);
    }

    protected function showEntity(StoreInterface $store, ShowRequestInterface $request, callable $mapper)
    {
        $response = $this->client->request(
            $request->getMethod() ?? 'GET',
            $request->getUrl() ?? $this->getRootUrl($store, $request).'/'.$request->getId(),
            $this->getRequestParams($store, $request, [], $this->token)
        );

        $data = json_decode((string) $response->getBody(), true);

        return call_user_func_array($mapper, [$data['data']]);
    }

    protected function updateEntity(StoreInterface $store, UpdateRequestInterface $request, callable $mapper)
    {
        $response = $this->client->request(
            $request->getMethod() ?? 'PUT',
            $request->getUrl() ?? $this->getRootUrl($store, $request).'/'.$request->getId(),
            $this->getRequestParams($store, $request, $request->getPayload(), $this->token)
        );

        $data = json_decode((string) $response->getBody(), true);

        return call_user_func_array($mapper, [$data['data']]);
    }

    protected function deleteEntity(StoreInterface $store, DeleteRequestInterface $request)
    {
        $this->client->request(
            $request->getMethod() ?? 'DELETE',
            $request->getUrl() ?? $this->getRootUrl($store, $request).'/'.$request->getId(),
            $this->getRequestParams($store, $request, [], $this->token)
        );
    }
}
