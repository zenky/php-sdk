<?php

declare(strict_types=1);

namespace Zenky\Modifiers\Interfaces;

use Zenky\Common\Interfaces\PriceInterface;
use Zenky\ExternalIdentifiers\Interfaces\ExternalIdentifierInterface;

interface ModifierInterface
{
    public function getId(): string;

    public function getStoreId(): string;

    public function getModifiersGroupId(): ?string;

    public function getName(): ?string;

    public function getDisplayName(): ?string;

    public function getPrice(): ?PriceInterface;

    public function getExternalIdentifier(): ?ExternalIdentifierInterface;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;
}
