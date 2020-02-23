<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\ResultGenerator;

echo "OMGHAI!\n";

$days = 2;
if (count($argv) > 1) {
    $days = (int)$argv[1];
}

$results = ResultGenerator::generate($days);

file_put_contents('fixtures/results.txt', json_encode($results));
