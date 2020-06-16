<?php

declare(strict_types=1);

namespace Zenky\NotificationReceivers\Interfaces\Responses;

use Zenky\Api\Interfaces\Responses\PaginatedResponseInterface;
use Zenky\NotificationReceivers\Interfaces\NotificationReceiverInterface;

interface PaginatedNotificationReceiversResponseInterface extends PaginatedResponseInterface
{
    /** @return array|NotificationReceiverInterface[] */
    public function getItems(): array;
}
