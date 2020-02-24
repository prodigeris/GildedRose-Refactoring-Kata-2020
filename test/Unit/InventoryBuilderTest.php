<?php

declare(strict_types=1);

use App\AgedBrie;
use App\Item;
use App\InventoryBuilder;
use PHPUnit\Framework\TestCase;

class InventoryBuilderTest extends TestCase
{
    private const AGED_BRIE = 'Aged brie';

    private InventoryBuilder $itemBuilder;

    protected function setUp(): void
    {
        $this->itemBuilder = new InventoryBuilder();
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
