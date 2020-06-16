<?php

declare(strict_types=1);

namespace Zenky\Offers;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Media\Interfaces\MediaInterface;
use Zenky\Media\Traits\IncludesMedia;
use Zenky\Offers\Interfaces\OfferInterface;

class Offer extends AbstractApiEntity implements OfferInterface
{
    use IncludesMedia;

    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getName(): ?string
    {
        return $this->data['name'];
    }

    public function getDescription(): ?string
    {
        return $this->data['description'];
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('created_at');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->getDateTimeInstance('updated_at');
    }

    public function getCoverImage(): ?MediaInterface
    {
        return $this->getMediaInstance('cover');
    }
}
