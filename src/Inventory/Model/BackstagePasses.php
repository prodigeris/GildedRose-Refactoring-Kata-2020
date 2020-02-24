<?php

declare(strict_types=1);

namespace App\Inventory\Model;

class BackstagePasses extends AbstractInventory
{
    public const NAME = 'Backstage passes to a TAFKAL80ETC concert';

    public function dayPasses(): void
    {
        $this->sellIn->decrease();
        if ($this->sellIn->hasPassed()) {
            $this->quality->setToZero();
        } else if ($this->sellIn->toInt() <= 5) {
            $this->quality->increase(3);
        } else if ($this->sellIn->toInt() <= 10) {
            $this->quality->increase(2);
        } else {
            $this->quality->increase();
        }
        $this->updateItem();
    }
}
