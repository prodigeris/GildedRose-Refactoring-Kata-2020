<?php

declare(strict_types=1);

namespace App\Inventory\Model;

class AgedBrie extends AbstractInventory
{
    public const NAME = 'Aged Brie';

    public function dayPasses(): void
    {
        $this->sellIn->decrease();
        $this->quality->increase();
        $this->updateItem();
    }
}
