<?php

declare(strict_types=1);

namespace App\Inventory\Builder;

use App\Inventory\Model\AbstractInventory;
use App\Inventory\Model\AgedBrie;
use App\Inventory\Model\BackstagePasses;
use App\Inventory\Model\ConjuredManaCake;
use App\Inventory\Model\DexterityVest;
use App\Inventory\Model\ElixirOfTheMongoose;
use App\Inventory\Model\SulfurasHandOfRagnaros;
use App\Item;
use RuntimeException;

class InventoryBuilder
{
    public function build(Item $item): AbstractInventory
    {
        switch ($item->name) {
            case SulfurasHandOfRagnaros::NAME:
                return SulfurasHandOfRagnaros::build($item);
            case ElixirOfTheMongoose::NAME:
                return ElixirOfTheMongoose::build($item);
            case DexterityVest::NAME:
                return DexterityVest::build($item);
            case AgedBrie::NAME:
                return AgedBrie::build($item);
            case BackstagePasses::NAME:
                return BackstagePasses::build($item);
            case ConjuredManaCake::NAME:
                return ConjuredManaCake::build($item);
            default:
                throw new RuntimeException('Unknown item');
        }
    }
}
