<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\NotificationReceivers;

use Zenky\Api\Requests\CreateRequest;
use Zenky\Api\Requests\DeleteRequest;
use Zenky\Api\Requests\ListRequest;
use Zenky\Api\Requests\ShowRequest;
use Zenky\Api\Requests\UpdateRequest;
use Zenky\NotificationReceivers\NotificationReceiversService;
use Zenky\NotificationReceivers\Interfaces\NotificationReceiverInterface;
use Zenky\NotificationReceivers\Interfaces\Responses\PaginatedNotificationReceiversResponseInterface;
use Zenky\Tests\TestCase;

class NotificationReceiversServiceTest extends TestCase
{
    public function testItShouldCreateNotificationReceivers()
    {
        $store = $this->createStore();
        $request = new CreateRequest([]);

        $client = $this->createHttpMockForCreateRequest(
            $store,
            $request,
            'notification-receivers',
            fn () => $this->createFakeResponseForEntity('notification-receivers/receiver.json')
        );

        $service = new NotificationReceiversService($client, 'secret');
        $item = $service->create($store, $request);
        $this->assertInstanceOf(NotificationReceiverInterface::class, $item);
    }

    public function testItShouldListNotificationReceivers()
    {
        $store = $this->createStore();
        $request = new ListRequest();

        $client = $this->createHttpMockForListRequest(
            $store,
            $request,
            'notification-receivers',
            fn () => $this->createFakeResponseForEntitiesCollection(5, 'notification-receivers/receiver.json')
        );

        $service = new NotificationReceiversService($client, 'secret');
        $response = $service->list($store, $request);
        $this->assertInstanceOf(PaginatedNotificationReceiversResponseInterface::class, $response);
        $this->assertSame(5, count($response->getItems()));

        foreach ($response->getItems() as $item) {
            $this->assertInstanceOf(NotificationReceiverInterface::class, $item);
        }
    }

    public function testItShouldShowNotificationReceivers()
    {
        $store = $this->createStore();
        $request = new ShowRequest('id');

        $client = $this->createHttpMockForShowRequest(
            $store,
            $request,
            'notification-receivers/id',
            fn () => $this->createFakeResponseForEntity('notification-receivers/receiver.json')
        );

        $service = new NotificationReceiversService($client, 'secret');
        $item = $service->show($store, $request);
        $this->assertInstanceOf(NotificationReceiverInterface::class, $item);
    }

    public function testItShouldUpdateNotificationReceivers()
    {
        $store = $this->createStore();
        $request = new UpdateRequest('id', []);

        $client = $this->createHttpMockForUpdateRequest(
            $store,
            $request,
            'notification-receivers/id',
            fn () => $this->createFakeResponseForEntity('notification-receivers/receiver.json')
        );

        $service = new NotificationReceiversService($client, 'secret');
        $item = $service->update($store, $request);
        $this->assertInstanceOf(NotificationReceiverInterface::class, $item);
    }

    public function testItShouldDeleteNotificationReceivers()
    {
        $store = $this->createStore();
        $request = new DeleteRequest('id');

        $client = $this->createHttpMockForDeleteRequest(
            $store,
            $request,
            'notification-receivers/id'
        );

        $service = new NotificationReceiversService($client, 'secret');
        $service->delete($store, $request);
    }
}
