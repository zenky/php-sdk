<?php

declare(strict_types=1);

namespace Zenky\PriceTypes;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Common\Enum;
use Zenky\Common\Interfaces\EnumInterface;
use Zenky\PriceTypes\Interfaces\PriceTypeInterface;

class PriceType extends AbstractApiEntity implements PriceTypeInterface
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

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('created_at');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('updated_at');
    }
}
