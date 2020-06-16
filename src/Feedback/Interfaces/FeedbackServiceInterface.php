<?php

declare(strict_types=1);

namespace Zenky\Feedback\Interfaces;

use Zenky\Api\Interfaces\Requests\CreateRequestInterface;
use Zenky\Api\Interfaces\Requests\DeleteRequestInterface;
use Zenky\Api\Interfaces\Requests\ListRequestInterface;
use Zenky\Api\Interfaces\Requests\ShowRequestInterface;
use Zenky\Feedback\Interfaces\Responses\PaginatedFeedbackResponseInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface FeedbackServiceInterface
{
    public function create(StoreInterface $store, CreateRequestInterface $request): FeedbackInterface;

    public function list(StoreInterface $store, ListRequestInterface $request): PaginatedFeedbackResponseInterface;

    public function show(StoreInterface $store, ShowRequestInterface $request): FeedbackInterface;

    public function delete(StoreInterface $store, DeleteRequestInterface $request): void;
}
