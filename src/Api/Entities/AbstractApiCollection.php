<?php

declare(strict_types=1);

namespace Zenky\Api\Entities;

abstract class AbstractApiCollection implements \ArrayAccess, \Iterator
{
    private array $items;
    private array $keys;
    private int $index;

    public function __construct(array $items)
    {
        $this->items = $items;
        $this->keys = array_keys($items);
        $this->index = 0;
    }

    abstract public function getItems();

    public function current()
    {
        return $this->items[$this->index];
    }

    public function next()
    {
        $this->index++;
    }

    public function key()
    {
        return $this->keys[$this->index];
    }

    public function valid()
    {
        return $this->offsetExists($this->index);
    }

    public function rewind()
    {
        $this->index = 0;
    }

    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->items[$offset];
    }

    public function offsetSet($offset, $value)
    {
        throw new \LogicException('AbstractApiCollection is immutable.');
    }

    public function offsetUnset($offset)
    {
        throw new \LogicException('AbstractApiCollection is immutable.');
    }
}
