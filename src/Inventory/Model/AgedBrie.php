<?php

declare(strict_types=1);

namespace App\Inventory\Model;

class AgedBrie extends AbstractInventory
{
    public const NAME = 'Aged Brie';

    protected int $qualityStep = -1;
}
