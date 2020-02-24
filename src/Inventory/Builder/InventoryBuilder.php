<?php

declare(strict_types=1);

namespace App\Inventory\Builder;

use App\Inventory\Model\AbstractInventory;
use App\Inventory\Model\AgedBrie;
use App\Inventory\Model\DexterityVest;
use App\Inventory\Model\ElixirOfTheMongoose;
use App\Item;

class InventoryBuilder
{
    public function build(Item $item): AbstractInventory
    {
        if ($item->name === ElixirOfTheMongoose::NAME) {
            return ElixirOfTheMongoose::build($item);
        }
        if ($item->name === DexterityVest::NAME) {
           return DexterityVest::build($item);
        }
        return AgedBrie::build($item);
    }
}
