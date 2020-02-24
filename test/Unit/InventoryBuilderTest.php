<?php

declare(strict_types=1);

use App\AgedBrie;
use App\DexterityVest;
use App\Item;
use App\InventoryBuilder;
use PHPUnit\Framework\TestCase;

class InventoryBuilderTest extends TestCase
{
    private const AGED_BRIE = 'Aged brie';
    const DEXTERITY_VEST = '+5 Dexterity Vest';

    private InventoryBuilder $itemBuilder;

    protected function setUp(): void
    {
        $this->itemBuilder = new InventoryBuilder();
    }

    /**
     * @test
     */
    public function should_build_dexterity_vest_when_name_is_plus_five_dexterity_vest(): void
    {
        // given
        $item = new Item(self::DEXTERITY_VEST, 0, 0);

        // when
        $result = $this->itemBuilder->build($item);

        // then
        $this->assertEquals(new DexterityVest(0, 0), $result);
    }

    /**
     * @test
     */
    public function should_build_aged_brie_when_name_is_aged_brie(): void
    {
        // given
        $item = new Item(self::AGED_BRIE, 0, 0);

        // when
        $result = $this->itemBuilder->build($item);

        // then
        $this->assertEquals(new AgedBrie(0, 0), $result);
    }
}
