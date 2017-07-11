<?php

namespace TripSorter\Destination;

/**
 * Destination class
 *
 * @package TripSorter\Destination
 */
class Destination implements DestinationInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->name;
    }
}