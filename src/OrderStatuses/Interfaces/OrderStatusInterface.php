<?php

declare(strict_types=1);

namespace Zenky\OrderStatuses\Interfaces;

use Zenky\Common\Interfaces\EnumInterface;

interface OrderStatusInterface
{
    public function getId(): string;

    public function getName(): ?string;

    public function getKind(): EnumInterface;

    public function getBackgroundColor(): ?string;

    public function getSorting(): int;

    public function isHidden(): bool;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;
}
