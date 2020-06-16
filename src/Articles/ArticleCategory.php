<?php

declare(strict_types=1);

namespace Zenky\Articles;

use Zenky\Api\Entities\AbstractApiEntity;
use Zenky\Articles\Interfaces\ArticleCategoryInterface;

class ArticleCategory extends AbstractApiEntity implements ArticleCategoryInterface
{
    public function getId(): string
    {
        return $this->data['id'];
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
