<?php

declare(strict_types=1);

namespace App\Inventory\Model;

use App\InventoryProperty\Model\LegendaryQuality;
use App\InventoryProperty\Model\Quality;
use App\InventoryProperty\Model\SellIn;
use App\Item;

class SulfurasHandOfRagnaros extends AbstractInventory
{
    public const NAME = 'Sulfuras, Hand of Ragnaros';

    public function __construct(Item $item, SellIn $sellIn, Quality $quality = null)
    {
        parent::__construct($item, $sellIn, new LegendaryQuality());
        $this->updateItem();
    }

    public function dayPasses(): void
    {
        // Does not do anything as it is Sulfuras
    }
}
