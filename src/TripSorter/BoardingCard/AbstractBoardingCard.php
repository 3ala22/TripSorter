<?php

namespace TripSorter\BoardingCard;

use TripSorter\BoardingCard\Contract\BoardingCardInterface;

abstract class AbstractBoardingCard implements BoardingCardInterface
{

    /**
     * @var string
     */
    protected $departure;

    /**
     * @var string
     */
    protected $arrival;

    /**
     * @var string
     */
    protected $seat;

    /**
     * Construct a boarding card.
     *
     * @param string $departure
     * @param string $arrival
     * @param string $seat
     */
    public function __construct($departure, $arrival, $seat)
    {
        $this->departure = $departure;
        $this->arrival = $arrival;
        $this->seat = $seat;
    }

    /**
     * {@inheritdoc}
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * {@inheritdoc}
     */
    public function getArrival()
    {
        return $this->arrival;
    }

    /**
     * Get seat assignment.
     *
     * @return string
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * {@inheritdoc}
     */
    abstract public function __toString();
}