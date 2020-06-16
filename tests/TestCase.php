<?php

declare(strict_types=1);

namespace Zenky\Tests;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase as BaseTestCase;
use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Api\Interfaces\Requests\UpdateRequestInterface;
use Zenky\Api\Traits\GeneratesRequestParams;
use Zenky\Stores\Interfaces\StoreInterface;
use Zenky\Stores\Store;
use Zenky\Tests\Fakes\FakeResponse;

abstract class TestCase extends BaseTestCase
{
    use GeneratesRequestParams;
    use MockeryPHPUnitIntegration;

    public function createHttpMock(callable $mocker)
    {
        $mock = \Mockery::mock(ClientInterface::class);

        call_user_func_array($mocker, [$mock]);

        return $mock;
    }

    public function createHttpMockForCreateRequest(
        StoreInterface $store,
        CreateRequestInterface $request,
        string $url,
        callable $responseMaker
    ) {
        return $this->createHttpMock(function (MockInterface $mock) use ($store, $request, $url, $responseMaker) {
            $mock->shouldReceive('request')
                ->once()
                ->with(...[
                    'POST',
                    $url,
                    $this->getRequestParams($store, $request, $request->getPayload(), 'secret'),
                ])
                ->andReturn(
                    call_user_func_array($responseMaker, [$store, $request])
                );
        });
    }

    public function createHttpMockForUpdateRequest(
        StoreInterface $store,
        UpdateRequestInterface $request,
        string $url,
        callable $responseMaker
    ) {
        return $this->createHttpMock(function (MockInterface $mock) use ($store, $request, $url, $responseMaker) {
            $mock->shouldReceive('request')
                ->once()
                ->with(...[
                    'PUT',
                    $url,
                    $this->getRequestParams($store, $request, $request->getPayload(), 'secret'),
                ])
                ->andReturn(
                    call_user_func_array($responseMaker, [$store, $request])
                );
        });
    }

    public function createHttpMockForListRequest(
        StoreInterface $store,
        ListRequestInterface $request,
        string $url,
        callable $responseMaker
    ) {
        return $this->createHttpMock(function (MockInterface $mock) use ($store, $request, $url, $responseMaker) {
            $mock->shouldReceive('request')
                ->once()
                ->with(...[
                    'GET',
                    $url,
                    $this->getRequestParams($store, $request, [], 'secret'),
                ])
                ->andReturn(
                    call_user_func_array($responseMaker, [$store, $request])
                );
        });
    }

    public function createHttpMockForShowRequest(
        StoreInterface $store,
        ShowRequestInterface $request,
        string $url,
        callable $responseMaker
    ) {
        return $this->createHttpMock(function (MockInterface $mock) use ($store, $request, $url, $responseMaker) {
            $mock->shouldReceive('request')
                ->once()
                ->with(...[
                    'GET',
                    $url,
                    $this->getRequestParams($store, $request, [], 'secret'),
                ])
                ->andReturn(
                    call_user_func_array($responseMaker, [$store, $request])
                );
        });
    }

    public function createHttpMockForDeleteRequest(StoreInterface $store, DeleteRequestInterface $request, string $url)
    {
        return $this->createHttpMock(function (MockInterface $mock) use ($store, $request, $url) {
            $mock->shouldReceive('request')
                ->once()
                ->with(...[
                    'DELETE',
                    $url,
                    $this->getRequestParams($store, $request, [], 'secret'),
                ])
                ->andReturn(FakeResponse::empty());
        });
    }

    public function createStore(array $includes = []): StoreInterface
    {
        return new Store($this->createEntity('stores/store.json', $includes));
    }

    public function createFakeResponseForEntity(string $name, array $includes = []): Response
    {
        return FakeResponse::make([
            'data' => $this->createEntity($name, $includes),
        ]);
    }

    public function createFakeResponseForEntitiesCollection(int $count, string $name, array $includes = [])
    {
        $entity = $this->createEntity($name, $includes);

        return FakeResponse::make(['data' => array_fill(0, $count, $entity)]);
    }

    public function createEntity(?string $name, array $includes = [])
    {
        if (is_null($name)) {
            return null;
        }

        $entity = json_decode(
            file_get_contents(__DIR__.'/Fixtures/entities/'.$name),
            true
        );

        if (empty($includes)) {
            return $entity;
        }

        foreach ($includes as $key => $include) {
            $entity[$key] = $this->createEntity(
                $this->getEntityNameFromInclude($include),
                $this->getEntityIncludesFromInclude($include)
            );
        }

        return $entity;
    }

    protected function getEntityNameFromInclude($include): ?string
    {
        if (is_string($include)) {
            return $include;
        } elseif (is_array($include) && !empty($include['name']) && is_string($include['name'])) {
            return $include['name'];
        }

        return null;
    }

    protected function getEntityIncludesFromInclude($include): array
    {
        return is_array($include) && is_array($include['includes']) ? $include['includes'] : [];
    }
}
