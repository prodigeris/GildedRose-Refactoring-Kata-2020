<?php

declare(strict_types=1);

namespace App\Inventory\Model;

use App\InventoryProperty\Model\Quality;
use App\InventoryProperty\Model\SellIn;
use App\Item;

abstract class AbstractInventory
{
    private SellIn $sellIn;
    private Quality $quality;

    public function __construct(SellIn $sellIn, Quality $quality)
    {
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    public static function build(Item $item): self
    {
        return new static(new SellIn($item->sell_in), new Quality($item->quality));
    }

    public function getSellIn(): SellIn
    {
        return $this->sellIn;
    }

    public function setSellIn(SellIn $sellIn): void
    {
        $this->sellIn = $sellIn;
    }

    public function getQuality(): Quality
    {
        return $this->quality;
    }

    public function setQuality(Quality $quality): void
    {
        $this->quality = $quality;
    }
}
