<?php

// Composer autoload
require_once __DIR__ . '/vendor/autoload.php';

$string = file_get_contents(__DIR__ . "/data/cards.json");
$boardingCards = json_decode($string, true);

$tripSorter = new TripSorter\TripSorter();

$unsorted = $tripSorter->parse($boardingCards);

$sorted = $tripSorter->sort($unsorted);

foreach ($sorted as $card){
    echo $card . PHP_EOL;
} ;

echo 'You have arrived at your final destination.' . PHP_EOL;
