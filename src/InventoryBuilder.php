<?php

declare(strict_types=1);

namespace App;

class InventoryBuilder
{
    public function build(Item $item): AbstractInventory
    {
        return new AgedBrie($item->sell_in, $item->quality);
    }
}
