<?php

declare(strict_types=1);

namespace Zenky\Modifiers;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Common\Interfaces\PriceInterface;
use Zenky\Common\Price;
use Zenky\ExternalIdentifiers\Traits\IncludesExternalIdentifier;
use Zenky\Modifiers\Interfaces\ModifierInterface;

class Modifier extends AbstractApiEntity implements ModifierInterface
{
    use IncludesExternalIdentifier;

    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getStoreId(): string
    {
        return $this->data['store_id'];
    }

    public function getModifiersGroupId(): ?string
    {
        return $this->data['modifiers_group_id'];
    }

    public function getName(): ?string
    {
        return $this->data['name'];
    }

    public function getDisplayName(): ?string
    {
        return $this->data['display_name'];
    }

    public function getPrice(): ?PriceInterface
    {
        return $this->getAttributeEntity('price', fn (array $data) => new Price($data));
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
