<?php

declare(strict_types=1);

namespace Zenky\CardTokens;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\CardTokens\Interfaces\BankInfoInterface;
use Zenky\CardTokens\Interfaces\BankLogosInterface;

class BankInfo extends AbstractEntity implements BankInfoInterface
{
    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getName(): string
    {
        return $this->data['name'];
    }

    public function getUrl(): string
    {
        return $this->data['url'];
    }

    public function getBackgroundColors(): array
    {
        return $this->data['background_colors'];
    }

    public function getPrimaryBackgroundColor(): string
    {
        return $this->data['primary_background_color'];
    }

    public function getBackgroundStyle(): string
    {
        return $this->data['background_style'];
    }

    public function getTextColor(): string
    {
        return $this->data['text_color'];
    }

    public function getLogoStyle(): string
    {
        return $this->data['logo_style'];
    }

    public function getLogos(): BankLogosInterface
    {
        return $this->getAttributeEntity('logos', fn (array $data) => new BankLogos($data));
    }
}
