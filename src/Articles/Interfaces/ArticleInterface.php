<?php

declare(strict_types=1);

namespace Zenky\Articles\Interfaces;

use Zenky\Media\Interfaces\MediaInterface;

interface ArticleInterface
{
    public function getId(): string;

    public function getSlug(): ?string;

    public function getTitle(): ?string;

    public function getIntro(): ?string;

    public function getBody(): ?string;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;

    public function getCoverImage(): ?MediaInterface;

    public function getCategory(): ?ArticleCategoryInterface;
}
