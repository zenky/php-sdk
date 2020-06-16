<?php

declare(strict_types=1);

namespace Zenky\CardTokens;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\CardTokens\Interfaces\BankLogosInterface;

class BankLogos extends AbstractEntity implements BankLogosInterface
{
    public function getSvgLogoUrl(): ?string
    {
        return $this->data['svg'] ?? null;
    }

    public function getPngLogoUrl(): ?string
    {
        return $this->data['png'] ?? null;
    }
}
