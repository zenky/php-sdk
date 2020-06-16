<?php

declare(strict_types=1);

namespace Zenky\ProductsCollections\Interfaces;

use Zenky\Media\Interfaces\MediaInterface;
use Zenky\Products\Interfaces\ProductInterface;

interface ProductsCollectionInterface
{
    public function getId(): string;

    public function getType(): string;

    public function getCriteriaMatch(): string;

    public function getName(): ?string;

    public function getDescription(): ?string;

    public function isVisibleInMobileApp(): bool;

    public function getSorting(): int;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;

    /** @return array|ProductsCollectionCriterionInterface[] */
    public function getCriteria(): array;

    /** @return array|ProductInterface[] */
    public function getProducts(): array;

    public function getCoverImage(): ?MediaInterface;
}
