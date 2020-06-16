<?php

declare(strict_types=1);

namespace Zenky\Articles\Interfaces;

interface ArticleCategoryInterface
{
    public function getId(): string;

    public function getName(): ?string;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;
}
