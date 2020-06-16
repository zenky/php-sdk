<?php

declare(strict_types=1);

namespace Zenky\Common\Interfaces;

interface GeoPositionInterface
{
    public function getLatitude(): float;

    public function getLongitude(): float;
}
