<?php

declare(strict_types=1);

namespace Zenky\OrderStatuses;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Common\Enum;
use Zenky\Common\Interfaces\EnumInterface;
use Zenky\OrderStatuses\Interfaces\OrderStatusInterface;

class OrderStatus extends AbstractApiEntity implements OrderStatusInterface
{
    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getName(): ?string
    {
        return $this->data['name'];
    }

    public function getKind(): EnumInterface
    {
        return $this->getCachedEntity('kind', fn () => Enum::make($this->data['kind']));
    }

    public function getBackgroundColor(): ?string
    {
        return $this->data['background_color'];
    }

    public function getSorting(): int
    {
        return $this->data['sorting'];
    }

    public function isHidden(): bool
    {
        return $this->data['visible'] === false;
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
