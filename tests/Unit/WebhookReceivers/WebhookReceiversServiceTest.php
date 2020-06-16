<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\WebhookReceivers;

use Zenky\Api\Requests\CreateRequest;
use Zenky\Api\Requests\DeleteRequest;
use Zenky\Api\Requests\ListRequest;
use Zenky\Api\Requests\ShowRequest;
use Zenky\Api\Requests\UpdateRequest;
use Zenky\WebhookReceivers\WebhookReceiversService;
use Zenky\WebhookReceivers\Interfaces\WebhookReceiverInterface;
use Zenky\WebhookReceivers\Interfaces\Responses\PaginatedWebhookReceiversResponseInterface;
use Zenky\Tests\TestCase;

class WebhookReceiversServiceTest extends TestCase
{
    public function testItShouldCreateWebhookReceivers()
    {
        $store = $this->createStore();
        $request = new CreateRequest([]);

        $client = $this->createHttpMockForCreateRequest(
            $store,
            $request,
            'webhook-receivers',
            fn () => $this->createFakeResponseForEntity('webhook-receivers/receiver.json')
        );

        $service = new WebhookReceiversService($client, 'secret');
        $item = $service->create($store, $request);
        $this->assertInstanceOf(WebhookReceiverInterface::class, $item);
    }

    public function testItShouldListWebhookReceivers()
    {
        $store = $this->createStore();
        $request = new ListRequest();

        $client = $this->createHttpMockForListRequest(
            $store,
            $request,
            'webhook-receivers',
            fn () => $this->createFakeResponseForEntitiesCollection(5, 'webhook-receivers/receiver.json')
        );

        $service = new WebhookReceiversService($client, 'secret');
        $response = $service->list($store, $request);
        $this->assertInstanceOf(PaginatedWebhookReceiversResponseInterface::class, $response);
        $this->assertSame(5, count($response->getItems()));

        foreach ($response->getItems() as $item) {
            $this->assertInstanceOf(WebhookReceiverInterface::class, $item);
        }
    }

    public function testItShouldShowWebhookReceivers()
    {
        $store = $this->createStore();
        $request = new ShowRequest('id');

        $client = $this->createHttpMockForShowRequest(
            $store,
            $request,
            'webhook-receivers/id',
            fn () => $this->createFakeResponseForEntity('webhook-receivers/receiver.json')
        );

        $service = new WebhookReceiversService($client, 'secret');
        $item = $service->show($store, $request);
        $this->assertInstanceOf(WebhookReceiverInterface::class, $item);
    }

    public function testItShouldUpdateWebhookReceivers()
    {
        $store = $this->createStore();
        $request = new UpdateRequest('id', []);

        $client = $this->createHttpMockForUpdateRequest(
            $store,
            $request,
            'webhook-receivers/id',
            fn () => $this->createFakeResponseForEntity('webhook-receivers/receiver.json')
        );

        $service = new WebhookReceiversService($client, 'secret');
        $item = $service->update($store, $request);
        $this->assertInstanceOf(WebhookReceiverInterface::class, $item);
    }

    public function testItShouldDeleteWebhookReceivers()
    {
        $store = $this->createStore();
        $request = new DeleteRequest('id');

        $client = $this->createHttpMockForDeleteRequest(
            $store,
            $request,
            'webhook-receivers/id'
        );

        $service = new WebhookReceiversService($client, 'secret');
        $service->delete($store, $request);
    }
}
