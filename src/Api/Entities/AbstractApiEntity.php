<?php

declare(strict_types=1);

namespace Zenky\Api\Entities;

abstract class AbstractApiEntity extends AbstractEntity
{
    protected function getDateTimeInstance(string $attribute): ?\DateTimeImmutable
    {
        return $this->getCachedEntity($attribute.'_datetime', function () use ($attribute) {
            if (!$this->attributeFilled($attribute)) {
                return null;
            }

            return new \DateTimeImmutable(
                $this->data[$attribute]['datetime_utc'],
                new \DateTimeZone($this->data[$attribute]['timezone'])
            );
        });
    }
}
