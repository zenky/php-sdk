<?php

declare(strict_types=1);

namespace Zenky\Products\Interfaces;

use Zenky\Common\Interfaces\EnumInterface;

interface ProductVariantDimensionInterface
{
    public function getId(): string;

    public function getDimension(): EnumInterface;

    public function getType(): EnumInterface;

    public function getValue();

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;
}
