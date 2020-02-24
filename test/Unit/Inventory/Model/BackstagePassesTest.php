<?php

declare(strict_types=1);

use App\Inventory\Model\AgedBrie;
use App\Inventory\Model\BackstagePasses;
use App\InventoryProperty\Model\Quality;
use App\InventoryProperty\Model\SellIn;
use App\Item;
use PHPUnit\Framework\TestCase;

class BackstagePassesTest extends TestCase
{
    /**
     * @test
     */
    public function should_set_quality_to_zero_when_sell_in_has_passed(): void
    {
        // given
        $item = new Item('', 1, 2);
        $backstagePasses = new BackstagePasses($item, new SellIn(1), new Quality(2));

        // when
        $backstagePasses->dayPasses();

        // then
        $this->assertEquals(0, $item->quality);
    }


    /**
     * @test
     */
    public function should_increase_quality_by_1_when_day_passes_and_sell_in_more_than_10_days(): void
    {
        // given
        $item = new Item('', 30, 2);
        $backstagePasses = new BackstagePasses($item, new SellIn(30), new Quality(2));

        // when
        $backstagePasses->dayPasses();

        // then
        $this->assertEquals(3, $item->quality);
    }

    /**
     * @test
     */
    public function should_increase_quality_by_2_when_day_passes_and_sell_in_10_days(): void
    {
        // given
        $item = new Item('', 11, 2);
        $backstagePasses = new BackstagePasses($item, new SellIn(11), new Quality(2));

        // when
        $backstagePasses->dayPasses();

        // then
        $this->assertEquals(4, $item->quality);
    }

    /**
     * @test
     */
    public function should_increase_quality_by_3_when_day_passes_and_sell_in_5_days(): void
    {
        // given
        $item = new Item('', 6, 2);
        $backstagePasses = new BackstagePasses($item, new SellIn(6), new Quality(2));

        // when
        $backstagePasses->dayPasses();

        // then
        $this->assertEquals(5, $item->quality);
    }
}
