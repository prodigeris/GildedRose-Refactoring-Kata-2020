<?php

declare(strict_types=1);

use App\Inventory\Builder\InventoryBuilder;
use App\Inventory\Model\AgedBrie;
use App\Inventory\Model\DexterityVest;
use App\InventoryProperty\Model\Quality;
use App\InventoryProperty\Model\SellIn;
use App\Item;
use PHPUnit\Framework\TestCase;

class InventoryBuilderTest extends TestCase
{
    private const AGED_BRIE = 'Aged brie';
    private const DEXTERITY_VEST = '+5 Dexterity Vest';

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
        $this->assertEquals(new $class(new SellIn(0), new Quality(0)), $result);
    }
}
