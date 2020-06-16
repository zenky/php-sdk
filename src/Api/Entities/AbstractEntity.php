<?php

declare(strict_types=1);

namespace Zenky\Api\Entities;

abstract class AbstractEntity
{
    protected array $data;
    protected array $cache = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getAttribute(string $attribute)
    {
        return $this->data[$attribute] ?? null;
    }

    protected function attributeExists(string $attribute): bool
    {
        return isset($this->data[$attribute]);
    }

    protected function attributeFilled(string $attribute): bool
    {
        return $this->attributeExists($attribute) && !empty($this->getAttribute($attribute));
    }

    protected function getCachedEntity(string $key, callable $builder)
    {
        if (isset($this->cache[$key])) {
            return $this->cache[$key];
        }

        return $this->cache[$key] = call_user_func($builder);
    }

    protected function getAttributeEntity(string $attribute, callable $builder)
    {
        return $this->getCachedEntity('attribute_'.$attribute.'_entity', function () use ($attribute, $builder) {
            if (!$this->attributeFilled($attribute)) {
                return null;
            }

            return call_user_func_array($builder, [$this->data[$attribute]]);
        });
    }

    protected function getAttributeCollection(string $attribute, callable $builder)
    {
        return $this->getCachedEntity('attribute_'.$attribute.'_collection', function () use ($attribute, $builder) {
            if (!$this->attributeFilled($attribute) || !is_array($this->data[$attribute])) {
                return null;
            }

            return array_map($builder, $this->data[$attribute]);
        });
    }
}
