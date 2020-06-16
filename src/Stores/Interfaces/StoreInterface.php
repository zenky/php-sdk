<?php

declare(strict_types=1);

namespace Zenky\Stores\Interfaces;

use Zenky\Cities\Interfaces\HasCities;
use Zenky\Contacts\Interfaces\HasContacts;
use Zenky\Media\Interfaces\MediaInterface;

interface StoreInterface extends HasContacts, HasCities
{
    public function getId(): string;

    public function getName(): ?string;

    public function getSlug(): ?string;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;

    public function getLogoImage(): ?MediaInterface;

    public function getSettings(): ?StoreSettingsInterface;
}
