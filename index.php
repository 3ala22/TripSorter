<?php

// Composer autoload
require_once __DIR__ . '/vendor/autoload.php';

$string = file_get_contents(__DIR__ . "/data/cards.json");
$json = json_decode($string, true);

$tripSorter = new \TripSorter\TripSorter();

$unsorted = \TripSorter\Parser::parse($json);

$sorted = $tripSorter->sort($unsorted);

echo \TripSorter\Formatter::format($sorted);
