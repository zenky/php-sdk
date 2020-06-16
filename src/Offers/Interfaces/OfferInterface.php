<?php

declare(strict_types=1);

namespace Zenky\Offers\Interfaces;

use Zenky\Media\Interfaces\MediaInterface;

interface OfferInterface
{
    public function getId(): string;

    public function getName(): ?string;

    public function getDescription(): ?string;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;

    public function getCoverImage(): ?MediaInterface;
}
