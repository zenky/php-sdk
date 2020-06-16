<?php

declare(strict_types=1);

namespace Zenky\ProductsCollections\Interfaces;

interface ProductsCollectionCriterionInterface
{
    public function getId(): string;

    public function getField(): ?string;

    public function getComparison(): ?string;

    public function getValue(): ?string;

    public function getFormattedValue(): ?string;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;
}
