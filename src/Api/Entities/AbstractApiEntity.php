<?php

declare(strict_types=1);

namespace Zenky\Api\Entities;

abstract class AbstractApiEntity extends AbstractEntity
{
    protected function getDateTimeInstance(string $attribute, string $datetimeField = 'datetime_utc'): ?\DateTimeImmutable
    {
        return $this->getCachedEntity($attribute.'_datetime', function () use ($attribute, $datetimeField) {
            if (!$this->attributeFilled($attribute)) {
                return null;
            }

            return new \DateTimeImmutable(
                $this->data[$attribute][$datetimeField],
                new \DateTimeZone($this->data[$attribute]['timezone'])
            );
        });
    }
}
