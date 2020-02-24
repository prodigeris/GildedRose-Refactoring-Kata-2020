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
        $this->setQuality($quality);
    }

    private function setQuality(int $quality): void
    {
        if($quality < 1) {
            $quality = 0;
        }
        if($quality > 50) {
            $quality = 50;
        }
        $this->quality = $quality;
    }

    public function toInt(): int
    {
        return $this->quality;
    }

    public function increase($byPoints = 1): void
    {
        $this->setQuality($this->quality + $byPoints);
    }

    public function decrease($byPoints = 1): void
    {
        $this->setQuality($this->quality - $byPoints);
    }

    public function setToZero(): void
    {
        $this->setQuality(0);
    }
}
