<?php

declare(strict_types=1);

namespace App\InventoryProperty\Model;

class LegendaryQuality extends Quality
{
    public const QUALITY = 80;
    protected int $quality = self::QUALITY;

    public function __construct()
    {
    }
}
