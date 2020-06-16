<?php

declare(strict_types=1);

namespace Zenky\PriceTypes\Interfaces;

use Zenky\Common\Interfaces\EnumInterface;

interface PriceTypeInterface
{
    public function getId(): string;

    public function getName(): ?string;

    public function getKind(): EnumInterface;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;
}
