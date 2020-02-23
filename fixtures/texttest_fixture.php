<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\GildedRose;
use App\Item;

echo "OMGHAI!\n";

$items = array(
    new Item('+5 Dexterity Vest', 10, 20),
    new Item('Aged Brie', 2, 0),
    new Item('Elixir of the Mongoose', 5, 7),
    new Item('Sulfuras, Hand of Ragnaros', 0, 80),
    new Item('Sulfuras, Hand of Ragnaros', -1, 80),
    new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20),
    new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49),
    new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
    // this conjured item does not work properly yet
//    new Item('Conjured Mana Cake', 3, 6)
);

$app = new GildedRose($items);

$days = 2;
if (count($argv) > 1) {
    $days = (int) $argv[1];
}

$results = [];

for ($i = 0; $i < $days; $i++) {
    foreach ($items as $item) {
        $results['day_'.$i][] = (string) $item;
    }
    $app->updateQuality();
}

file_put_contents('fixtures/results.txt', json_encode($results));
