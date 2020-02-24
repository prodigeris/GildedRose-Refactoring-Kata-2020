<?php

namespace App;

use App\Inventory\Builder\InventoryBuilder;

final class GildedRose
{

    private array $items = [];

    private InventoryBuilder $inventoryBuilder;

    public function __construct(InventoryBuilder $inventoryBuilder, $items)
    {
        $this->items = $items;
        $this->inventoryBuilder = $inventoryBuilder;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $this->inventoryBuilder->build($item)->dayPasses();
        }
    }
}

