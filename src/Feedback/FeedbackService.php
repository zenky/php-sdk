<?php

declare(strict_types=1);

namespace Zenky\Feedback;

use Zenky\Api\AbstractApiService;
use Zenky\Api\Interfaces\Requests\ApiRequestInterface;
use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Feedback\Interfaces\FeedbackServiceInterface;
use Zenky\Feedback\Interfaces\FeedbackInterface;
use Zenky\Feedback\Interfaces\Responses\PaginatedFeedbackResponseInterface;
use Zenky\Feedback\Responses\PaginatedFeedbackResponse;
use Zenky\Stores\Interfaces\StoreInterface;

class FeedbackService extends AbstractApiService implements FeedbackServiceInterface
{
    protected function getRootUrl(StoreInterface $store, ApiRequestInterface $request): string
    {
        return 'feedback';
    }

    public function create(StoreInterface $store, CreateRequestInterface $request): FeedbackInterface
    {
        return $this->createEntity($store, $request, fn (array $data) => new Feedback($data));
    }

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedFeedbackResponseInterface
    {
        return $this->listEntities(
            $store,
            $request,
            PaginatedFeedbackResponse::class,
            fn (array $data) => new Feedback($data)
        );
    }

    public function show(StoreInterface $store, ShowRequestInterface $request): FeedbackInterface
    {
        return $this->showEntity($store, $request, fn (array $data) => new Feedback($data));
    }

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void
    {
        $this->deleteEntity($store, $request);
    }
}
