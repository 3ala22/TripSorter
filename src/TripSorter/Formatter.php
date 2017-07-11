<?php

namespace TripSorter;

use TripSorter\BoardingCard\Contract\BoardingCardInterface;

/**
 * Formatter class
 *
 * @package TripSorter
 */
class Formatter
{

    /**
     * Take an array or ordered boarding cards and format the output.
     *
     * @param BoardingCardInterface[] $boardingCards
     * @return string
     */
    public static function format(array $boardingCards) {
        $index = 1;
        $output = '';

        foreach($boardingCards as $boardingCard){
            $output .= sprintf('%d. %s'.PHP_EOL, $index++, $boardingCard);
        }

        // end of journey line.
        $output .= sprintf('%d. You have arrived at your final destination.' .PHP_EOL, $index);
        return $output;
    }
}