<?php

namespace TripSorter\Destination;

interface DestinationInterface
{
    /**
     * Format destination into a human readable format.
     *
     * @return string
     */
    public function __toString();
}