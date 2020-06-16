<?php

declare(strict_types=1);

namespace Zenky\Products\Interfaces;

use Zenky\Categories\Interfaces\CategoryInterface;
use Zenky\Common\Interfaces\EnumInterface;
use Zenky\Common\Interfaces\WeightInterface;
use Zenky\ExternalIdentifiers\Interfaces\HasExternalIdentifier;
use Zenky\Media\Interfaces\MediaInterface;

interface ProductInterface extends HasExternalIdentifier
{
    public function getId(): string;

    public function getShortId(): string;

    public function getSlug(): ?string;

    public function getName(): ?string;

    public function getDescription(): ?string;

    public function getUnitType(): EnumInterface;

    public function getWeight(): WeightInterface;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;

    /** @return array|ProductVariantInterface[] */
    public function getVariants(): array;

    /** @return array|ProductFeatureInterface[] */
    public function getFeatures(): array;

    /** @return array|CategoryInterface[] */
    public function getCategories(): array;

    /** @return array|MediaInterface[] */
    public function getMedia(): array;

    public function getSettings(): ?ProductSettingsInterface;
}
