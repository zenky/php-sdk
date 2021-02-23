<?php

declare(strict_types=1);

namespace Zenky\Products\Interfaces;

use Zenky\Common\Interfaces\PriceInterface;
use Zenky\ExternalIdentifiers\Interfaces\HasExternalIdentifier;
use Zenky\Modifiers\Interfaces\HasModifiersGroupsInterface;
use Zenky\Modifiers\Interfaces\HasModifiersInterface;
use Zenky\VariantOptions\Interfaces\VariantOptionValueInterface;

interface ProductVariantInterface extends HasExternalIdentifier, HasModifiersInterface, HasModifiersGroupsInterface
{
    public function getId(): string;

    public function getProductId(): string;

    public function getName(): ?string;

    public function getSku(): ?string;

    public function getBarcode(): ?string;

    public function getPrice(): PriceInterface;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;

    /** @return array|ProductVariantPriceInterface[] */
    public function getVariantPrices(): array;

    /** @return array|VariantOptionValueInterface[] */
    public function getVariantOptionValues(): array;

    /** @return array|ProductVariantRemainderInterface[] */
    public function getRemainders(): array;

    /** @return array|ProductVariantDimensionInterface[] */
    public function getDimensions(): array;
}
