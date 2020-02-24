<?php

declare(strict_types=1);

use App\GildedRose;
use App\Inventory\Builder\InventoryBuilder;
use App\Item;
use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;

class GildedRoseContext implements Context
{
    private InventoryContext $inventoryContext;

    /**
     * @BeforeScenario
     * @param BeforeScenarioScope $scope
     */
    public function createScopedDependencies(BeforeScenarioScope $scope): void
    {
        $this->inventoryContext = $scope->getEnvironment()->getContext(InventoryContext::class);
    }


    /**
     * @When /^Day passes in Gilded Rose$/
     */
    public function dayPassesInGildedRose(): void
    {
        (new GildedRose(
            new InventoryBuilder(),
            $this->inventoryContext->getInventory(),
        ))->updateQuality();
    }


}
