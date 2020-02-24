<?php

declare(strict_types=1);

use App\Inventory\Builder\InventoryBuilder;
use App\Inventory\Model\AgedBrie;
use App\Inventory\Model\BackstagePasses;
use App\Inventory\Model\ConjuredManaCake;
use App\Inventory\Model\DexterityVest;
use App\Inventory\Model\ElixirOfTheMongoose;
use App\Inventory\Model\SulfurasHandOfRagnaros;
use App\InventoryProperty\Model\Quality;
use App\InventoryProperty\Model\SellIn;
use App\Item;
use PHPUnit\Framework\TestCase;

class InventoryBuilderTest extends TestCase
{
    private const AGED_BRIE = 'Aged Brie';
    private const DEXTERITY_VEST = '+5 Dexterity Vest';
    private const ELIXIR_OF_THE_MONGOOSE = 'Elixir of the Mongoose';
    private const SULFURAS_HAND_OF_RAGNAROS = 'Sulfuras, Hand of Ragnaros';
    private const BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT = 'Backstage passes to a TAFKAL80ETC concert';
    private const CONJURED_MANA_CAKE = 'Conjured Mana Cake';
    private const UNKNOWN = 'unknown';

    private InventoryBuilder $itemBuilder;

    protected function setUp(): void
    {
        $this->itemBuilder = new InventoryBuilder();
    }

    public function inventoryDataProvider(): array
    {
        return [
            [
                'name' => self::DEXTERITY_VEST, 'class' => DexterityVest::class,
            ],
            [
                'name' => self::AGED_BRIE, 'class' => AgedBrie::class,
            ],
            [
                'name' => self::ELIXIR_OF_THE_MONGOOSE, 'class' => ElixirOfTheMongoose::class,
            ],
            [
                'name' => self::SULFURAS_HAND_OF_RAGNAROS, 'class' => SulfurasHandOfRagnaros::class,
            ],
            [
                'name' => self::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT, 'class' => BackstagePasses::class,
            ],
            [
                'name' => self::CONJURED_MANA_CAKE, 'class' => ConjuredManaCake::class,
            ],
        ];
    }

    /**
     * @test
     * @dataProvider inventoryDataProvider
     */
    public function should_build_the_right_class_when_using_item_name(string $name, string $class): void
    {
        // given
        $item = new Item($name, 0, 0);

        // when
        $result = $this->itemBuilder->build($item);

        // then
        $this->assertEquals(new $class($item, new SellIn(0), new Quality(0)), $result);
    }

    /**
     * @test
     */
    public function should_throw_exception_when_item_is_unknown(): void
    {
        // given
        $item = new Item(self::UNKNOWN, 0, 0);

        // then
        $this->expectException(RuntimeException::class);

        // when
        $this->itemBuilder->build($item);
    }
}
