<?php

declare(strict_types=1);

namespace Zenky\Modifiers\Interfaces;

use Zenky\ExternalIdentifiers\Interfaces\ExternalIdentifierInterface;

interface ModifiersGroupInterface
{
    public function getId(): string;

    public function getStoreId(): string;

    public function getName(): ?string;

    public function getDisplayName(): ?string;

    public function getExternalIdentifier(): ?ExternalIdentifierInterface;

    /** @return ModifierInterface[] */
    public function getModifiers(): array;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;
}
