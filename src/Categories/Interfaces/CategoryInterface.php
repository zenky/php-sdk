<?php

declare(strict_types=1);

namespace Zenky\Categories\Interfaces;

use Zenky\ExternalIdentifiers\Interfaces\HasExternalIdentifier;
use Zenky\Media\Interfaces\MediaInterface;

interface CategoryInterface extends HasExternalIdentifier
{
    public function getId(): string;

    public function getShortId(): string;

    public function getParentId(): ?string;

    public function getSlug(): ?string;

    public function getName(): ?string;

    public function isHidden(): bool;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;

    public function getSettings(): ?CategorySettingsInterface;

    public function getCoverImage(): ?MediaInterface;
}
