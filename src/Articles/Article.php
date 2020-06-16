<?php

declare(strict_types=1);

namespace Zenky\Articles;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Articles\Interfaces\ArticleCategoryInterface;
use Zenky\Articles\Interfaces\ArticleInterface;
use Zenky\Media\Interfaces\MediaInterface;
use Zenky\Media\Traits\IncludesMedia;

class Article extends AbstractApiEntity implements ArticleInterface
{
    use IncludesMedia;

    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getSlug(): ?string
    {
        return $this->data['slug'];
    }

    public function getTitle(): ?string
    {
        return $this->data['title'];
    }

    public function getIntro(): ?string
    {
        return $this->data['intro'];
    }

    public function getBody(): ?string
    {
        return $this->data['body'];
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

    public function getCategory(): ?ArticleCategoryInterface
    {
        return $this->getAttributeEntity('category', fn (array $data) => new ArticleCategory($data));
    }
}
