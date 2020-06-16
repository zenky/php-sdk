<?php

declare(strict_types=1);

namespace Zenky\NotificationReceivers;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Common\Enum;
use Zenky\Common\Interfaces\EnumInterface;
use Zenky\NotificationReceivers\Interfaces\NotificationReceiverInterface;

class NotificationReceiver extends AbstractApiEntity implements NotificationReceiverInterface
{
    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getType(): EnumInterface
    {
        return $this->getCachedEntity('type', fn () => Enum::make($this->data['type']));
    }

    public function getValue()
    {
        return $this->data['value'];
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('created_at');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('updated_at');
    }
}
