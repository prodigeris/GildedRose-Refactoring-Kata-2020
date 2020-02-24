<?php

declare(strict_types=1);

use App\Inventory\Model\AgedBrie;
use App\Inventory\Model\SulfurasHandOfRagnaros;
use App\InventoryProperty\Model\LegendaryQuality;
use App\InventoryProperty\Model\Quality;
use App\InventoryProperty\Model\SellIn;
use App\Item;
use PHPUnit\Framework\TestCase;

class SulfurasHandOfRagnarosTest extends TestCase
{
    /**
     * @test
     */
    public function should_always_set_quality_to_legendary_quality(): void
    {
        // given
        $item = new Item('', 3, 2);

        // when
        new SulfurasHandOfRagnaros($item, new SellIn(1), new Quality(2));

        // then
        $this->assertEquals(LegendaryQuality::QUALITY, $item->quality);
    }
}
