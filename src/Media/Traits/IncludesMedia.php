<?php

declare(strict_types=1);

namespace Zenky\Media\Traits;

use Zenky\Media\Interfaces\MediaInterface;
use Zenky\Media\Media;

trait IncludesMedia
{
    protected function getMediaInstance(string $type, string $key = 'media'): ?MediaInterface
    {
        return $this->getCachedEntity($type.'_'.$key.'_media', function () use ($type, $key) {
            if (!isset($this->data[$key]) || !isset($this->data[$key][$type])) {
                return null;
            } elseif (is_null($this->data[$key][$type])) {
                return null;
            }

            return new Media($this->data[$key][$type]);
        });
    }
}
