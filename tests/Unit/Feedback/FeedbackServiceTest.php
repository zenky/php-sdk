<?php

declare(strict_types=1);

namespace Zenky\Tests\Unit\Feedback;

use Zenky\Api\Requests\CreateRequest;
use Zenky\Api\Requests\DeleteRequest;
use Zenky\Api\Requests\ListRequest;
use Zenky\Api\Requests\ShowRequest;
use Zenky\Feedback\FeedbackService;
use Zenky\Feedback\Interfaces\FeedbackInterface;
use Zenky\Feedback\Interfaces\Responses\PaginatedFeedbackResponseInterface;
use Zenky\Tests\TestCase;

class FeedbackServiceTest extends TestCase
{
    public function testItShouldCreateFeedback()
    {
        $store = $this->createStore();
        $request = new CreateRequest([]);

        $client = $this->createHttpMockForCreateRequest(
            $store,
            $request,
            'feedback',
            fn () => $this->createFakeResponseForEntity('feedback/feedback.json')
        );

        $service = new FeedbackService($client, 'secret');
        $item = $service->create($store, $request);
        $this->assertInstanceOf(FeedbackInterface::class, $item);
    }

    public function testItShouldListFeedback()
    {
        $store = $this->createStore();
        $request = new ListRequest();

        $client = $this->createHttpMockForListRequest(
            $store,
            $request,
            'feedback',
            fn () => $this->createFakeResponseForEntitiesCollection(5, 'feedback/feedback.json')
        );

        $service = new FeedbackService($client, 'secret');
        $response = $service->list($store, $request);
        $this->assertInstanceOf(PaginatedFeedbackResponseInterface::class, $response);
        $this->assertSame(5, count($response->getItems()));

        foreach ($response->getItems() as $item) {
            $this->assertInstanceOf(FeedbackInterface::class, $item);
        }
    }

    public function testItShouldShowFeedback()
    {
        $store = $this->createStore();
        $request = new ShowRequest('id');

        $client = $this->createHttpMockForShowRequest(
            $store,
            $request,
            'feedback/id',
            fn () => $this->createFakeResponseForEntity('feedback/feedback.json')
        );

        $service = new FeedbackService($client, 'secret');
        $item = $service->show($store, $request);
        $this->assertInstanceOf(FeedbackInterface::class, $item);
    }

    public function testItShouldDeleteFeedback()
    {
        $store = $this->createStore();
        $request = new DeleteRequest('id');

        $client = $this->createHttpMockForDeleteRequest(
            $store,
            $request,
            'feedback/id'
        );

        $service = new FeedbackService($client, 'secret');
        $service->delete($store, $request);
    }
}
