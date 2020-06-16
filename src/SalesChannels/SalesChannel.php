<?php

declare(strict_types=1);

namespace Zenky\SalesChannels;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Common\Enum;
use Zenky\Common\Interfaces\EnumInterface;
use Zenky\SalesChannels\Interfaces\SalesChannelInterface;

class SalesChannel extends AbstractApiEntity implements SalesChannelInterface
{
    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getType(): EnumInterface
    {
        return $this->getCachedEntity('type', fn () => Enum::make($this->data['type']));
    }

    public function getName(): ?string
    {
        return $this->data['name'];
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
