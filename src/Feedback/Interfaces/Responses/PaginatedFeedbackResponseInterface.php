<?php

declare(strict_types=1);

namespace Zenky\Feedback\Interfaces\Responses;

use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\Feedback\Interfaces\FeedbackInterface;

interface PaginatedFeedbackResponseInterface extends PaginatedResponseInterface
{
    /** @return array|FeedbackInterface[] */
    public function getItems(): array;
}
