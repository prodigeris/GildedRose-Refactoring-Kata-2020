<?php

declare(strict_types=1);

namespace App\Inventory\Model;

use App\InventoryProperty\Model\Quality;
use App\InventoryProperty\Model\SellIn;
use App\Item;

abstract class AbstractInventory
{
    protected SellIn $sellIn;
    protected Quality $quality;
    protected Item $item;

    public function __construct(Item $item, SellIn $sellIn, Quality $quality)
    {
        $this->item = $item;
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    public static function build(Item $item): self
    {
        return new static($item, new SellIn($item->sell_in), new Quality($item->quality));
    }

    protected function updateItem(): void
    {
        $this->item->sell_in = $this->sellIn->toInt();
        $this->item->quality = $this->quality->toInt();
    }

    public function dayPasses(): void
    {
        $qualityDrop = 1;
        $this->sellIn->decrease();
//        if ($this->sellIn->hasPassed()) {
//            $qualityDrop = 2;
//        }
        $this->quality->decrease($qualityDrop);

        $this->updateItem();
    }
}
