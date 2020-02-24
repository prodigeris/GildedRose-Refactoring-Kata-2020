<?php

declare(strict_types=1);

use App\InventoryProperty\Model\Quality;
use PHPUnit\Framework\TestCase;

class QualityTest extends TestCase
{
    /**
     * @test
     */
    public function should_set_quality_to_zero_when_it_is_negative(): void
    {
        // when
        $quality = new Quality(-1);

        // then
        $this->assertEquals(0, $quality->toInt());
    }

    /**
     * @test
     */
    public function should_set_quality_to_50_when_it_is_more_than_50(): void
    {
        // when
        $quality = new Quality(60);

        // then
        $this->assertEquals(50, $quality->toInt());
    }
}
