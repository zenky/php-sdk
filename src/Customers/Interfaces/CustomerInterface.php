<?php

declare(strict_types=1);

namespace Zenky\Customers\Interfaces;

use Zenky\Common\Interfaces\EnumInterface;
use Zenky\Common\Interfaces\PhoneInterface;
use Zenky\ExternalIdentifiers\Interfaces\HasExternalIdentifier;

interface CustomerInterface extends HasExternalIdentifier
{
    public function getId(): string;

    public function getStoreProfileId(): string;

    public function getFirstName(): ?string;

    public function getLastName(): ?string;

    public function getFullName(): ?string;

    public function getPhone(): PhoneInterface;

    public function getGender(): EnumInterface;

    public function getBithDate(): ?\DateTimeImmutable;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;
}
