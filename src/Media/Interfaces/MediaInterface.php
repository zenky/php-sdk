<?php

declare(strict_types=1);

namespace Zenky\Media\Interfaces;

interface MediaInterface
{
    public function getId(): string;

    public function getOriginalUrl(): string;

    public function getThumbUrl(): ?string;

    public function getMediumUrl(): ?string;

    public function getLargeUrl(): ?string;

    public function getExtraLargeUrl(): ?string;
}
