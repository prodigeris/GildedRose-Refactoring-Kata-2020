<?php

declare(strict_types=1);

namespace App\InventoryProperty\Model;

class Quality
{
    /**
     * @var int
     */
    protected int $quality;

    public function __construct(int $quality)
    {
        if($quality < 1) {
            $quality = 0;
        }
        if($quality > 50) {
            $quality = 50;
        }
        $this->quality = $quality;
    }

    public function getQuality(): int
    {
        return $this->quality;
    }
}
