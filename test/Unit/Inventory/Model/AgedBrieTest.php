<?php

declare(strict_types=1);

use App\Inventory\Model\AgedBrie;
use App\InventoryProperty\Model\Quality;
use App\InventoryProperty\Model\SellIn;
use App\Item;
use PHPUnit\Framework\TestCase;

class AgedBrieTest extends TestCase
{
    private const AGED_BRIE = 'Aged Brie';

    /**
     * @test
     */
    public function should_update_item_after_day_passes(): void
    {
        // given
        $item = new Item(self::AGED_BRIE, 3, 2);
        $agedBrie = new AgedBrie($item, new SellIn(3), new Quality(2));

        // when
        $agedBrie->dayPasses();

        // then
        $this->assertEquals(new Item(self::AGED_BRIE, 2, 3), $item);
    }

    /**
     * @test
     */
    public function should_increase_quality_by_1_when_the_day_passes(): void
    {
        // given
        $item = new Item(self::AGED_BRIE, 3, 2);
        $agedBrie = new AgedBrie($item, new SellIn(3), new Quality(2));

        // when
        $agedBrie->dayPasses();

        // then
        $this->assertEquals(3, $item->quality);
    }

    /**
     * @test
     */
    public function should_increase_quality_by_1_when_the_day_passes_and_sell_in_has_passed(): void
    {
        // given
        $item = new Item(self::AGED_BRIE, 0, 2);
        $agedBrie = new AgedBrie($item, new SellIn(0), new Quality(2));

        // when
        $agedBrie->dayPasses();

        // then
        $this->assertEquals(4, $item->quality);
    }

    /**
     * @test
     */
    public function should_update_items_quality_when_creating_aged_brie(): void
    {
        // givens
        $item = new Item(self::AGED_BRIE, 0, -1);

        // when
        new AgedBrie($item, new SellIn(0), new Quality(-1));

        // then
        $this->assertEquals(0, $item->quality);
    }
}
