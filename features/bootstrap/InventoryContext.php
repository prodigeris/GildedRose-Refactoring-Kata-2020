<?php

declare(strict_types=1);

use App\Item;
use Behat\Behat\Context\Context;
use PHPUnit\Framework\Assert;

class InventoryContext implements Context
{
    protected array $inventory;

    /**
     * @Given /^There is "([^"]*)" with sell in "([^"]*)" and quality "([^"]*)"$/
     */
    public function thereIsItemWithTheseProperties(string $name, int $sellIn, int $quality): void
    {
        $this->inventory[] = new Item($name, $sellIn, $quality);
    }

    public function getInventory(): array
    {
        return $this->inventory;
    }

    /**
     * @Then /^(\d+) item should be "([^"]*)" with sell in "([^"]*)" and quality "([^"]*)"$/
     */
    public function itemShouldBeWithSellInAndQuality(int $numberInList, string $name, int $sellIn, int $quality): void
    {
        Assert::assertEquals(new Item($name, $sellIn, $quality), $this->inventory[$numberInList]);
    }
}
