<?php

declare(strict_types=1);

namespace Zenky\Common;

use Zenky\Common\Interfaces\GeoPositionInterface;

class GeoPosition implements GeoPositionInterface
{
    private float $latitude;
    private float $longitude;

    public function __construct(float $latitude, float $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }
}
