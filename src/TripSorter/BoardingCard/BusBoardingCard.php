<?php

namespace TripSorter\BoardingCard;

/**
 * Bus Boarding Card
 *
 * @package TripSorter\BoardingCard
 */
class BusBoardingCard extends AbstractBoardingCard
{

    /**
     * @var string
     */
    protected $bus;

    /**
     * BusBoardingCard constructor.
     *
     * @param string $departure
     * @param string $arrival
     * @param string $seat
     * @param string $bus
     */
    public function __construct($departure, $arrival, $seat, $bus)
    {
        parent::__construct($departure, $arrival, $seat);

        $this->bus = $bus;
    }


    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return sprintf(
            'Take %s bus from %s to %s. %s.',
            $this->bus,
            $this->departure,
            $this->arrival,
            $this->seat ? 'Seat ' . $this->seat : 'No seat assignment'
        );
    }
}