<?php

declare(strict_types=1);

namespace Zenky\Feedback\Interfaces;

use Zenky\Common\Interfaces\PhoneInterface;

interface FeedbackInterface
{
    public function getId(): string;

    public function getName(): ?string;

    public function getEmail(): ?string;

    public function getPhone(): ?PhoneInterface;

    public function getComment(): ?string;

    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;
}
