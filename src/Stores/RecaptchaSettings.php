<?php

declare(strict_types=1);

namespace Zenky\Stores;

use Zenky\Api\Entities\AbstractEntity;
use Zenky\Common\Enum;
use Zenky\Stores\Interfaces\RecaptchaSettingsInterface;

class RecaptchaSettings extends AbstractEntity implements RecaptchaSettingsInterface
{
    public function isEnabled(): bool
    {
        return $this->data['enabled'] === true;
    }

    public function getActions(): array
    {
        return $this->getAttributeCollection('actions', fn (array $data) => Enum::make($data));
    }

    public function getKey(): ?string
    {
        return $this->data['key'];
    }
}
