<?php

declare(strict_types=1);

namespace Zenky\SalesChannels\Interfaces;

use Zenky\Common\Interfaces\EnumInterface;

interface SalesChannelInterface
{
    public function getId(): string;

    public function getType(): EnumInterface;

    public function getName(): ?string;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;
}
