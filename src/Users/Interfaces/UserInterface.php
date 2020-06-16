<?php

declare(strict_types=1);

namespace Zenky\Users\Interfaces;

use Zenky\Common\Interfaces\EnumInterface;
use Zenky\Common\Interfaces\PhoneInterface;
use Zenky\Media\Interfaces\MediaInterface;
use Zenky\Stores\Interfaces\StoreInterface;

interface UserInterface
{
    public function getId(): string;

    public function getFirstName(): ?string;

    public function getLastName(): ?string;

    public function getFullName(): ?string;

    public function getEmail(): ?string;

    public function getPhone(): ?PhoneInterface;

    public function getPhoneCountry(): ?string;

    public function getRole(): EnumInterface;

    public function getTimezone(): ?string;

    public function getLocale(): ?string;

    public function getDefaultAvatarUrl(): string;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;

    public function getAvatarImage(): ?MediaInterface;

    public function getStores(): array;

    public function getSelectedStore(): ?StoreInterface;
}
