<?php

declare(strict_types=1);

namespace App;

abstract class AbstractInventory
{
    private int $sellIn;
    private int $quality;

    public function __construct(int $sellIn, int $quality)
    {
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    public function getSellIn(): int
    {
        return $this->sellIn;
    }

    public function getQuality(): int
    {
        return $this->quality;
    }

    public function setSellIn(int $sellIn): void
    {
        $this->sellIn = $sellIn;
    }

    public function setQuality(int $quality): void
    {
        $this->quality = $quality;
    }
}
