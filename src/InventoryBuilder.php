<?php

declare(strict_types=1);

namespace App;

class InventoryBuilder
{
    public function build(Item $item): AbstractInventory
    {
        if ($item->name === DexterityVest::NAME) {
           return new DexterityVest($item->sell_in, $item->quality);
        }
        return new AgedBrie($item->sell_in, $item->quality);
    }
}
