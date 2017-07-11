<?php

namespace TripSorter\BoardingCard\Contract;
use TripSorter\Destination\DestinationInterface;

/**
 * Interface BoardingCardInterface
 * Should be implemented by boarding cards.
 *
 * @package TripSorter\BoardingCard
 */
interface BoardingCardInterface
{

    /**
     * Get trip departure city.
     *
     * @return DestinationInterface
     */
    public function getDeparture();

    /**
     * Get trip arrival city.
     *
     * @return DestinationInterface
     */
    public function getArrival();

    /**
     * Format boarding card into human readable format.
     *
     * @return string
     */
    public function __toString();

}