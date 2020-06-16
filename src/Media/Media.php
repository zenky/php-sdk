<?php

declare(strict_types=1);

namespace Zenky\Media;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Media\Interfaces\MediaInterface;

class Media extends AbstractApiEntity implements MediaInterface
{
    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getOriginalUrl(): string
    {
        return $this->data['url'];
    }

    public function getThumbUrl(): ?string
    {
        return $this->data['thumb_url'] ?? null;
    }

    public function getMediumUrl(): ?string
    {
        return $this->data['medium_url'] ?? null;
    }

    public function getLargeUrl(): ?string
    {
        return $this->data['large_url'] ?? null;
    }

    public function getExtraLargeUrl(): ?string
    {
        return $this->data['xlarge_url'] ?? null;
    }
}
