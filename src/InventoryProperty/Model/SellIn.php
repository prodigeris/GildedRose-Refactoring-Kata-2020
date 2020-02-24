<?php

declare(strict_types=1);

namespace App\InventoryProperty\Model;

class SellIn
{
    private int $days;

    public function __construct(int $days)
    {
        if($days < 1) {
            $days = 0;
        }
        $this->days = $days;
    }

    /**
     * @return int
     */
    public function getDays(): int
    {
        return $this->days;
    }
}
