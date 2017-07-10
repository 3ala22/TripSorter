<?php

namespace TripSorter\BoardingCard;

/**
 * Flight Boarding Card
 *
 * @package TripSorter\BoardingCard
 */
class FlightBoardingCard extends AbstractBoardingCard
{
    /**
     * @var string
     */
    protected $flight;

    /**
     * @var string
     */

    protected $gate;
    /**
     * @var string
     */

    protected $baggageTicketCounter;

    /**
     * FlightBoardingCard constructor.
     * @param string $departure
     * @param string $arrival
     * @param string $seat
     * @param string $flight
     * @param string $gate
     * @param string $baggageTicketCounter
     */
    public function __construct($departure, $arrival, $seat, $flight, $gate, $baggageTicketCounter)
    {
        parent::__construct($departure, $arrival, $seat);

        $this->flight = $flight;
        $this->gate = $gate;
        $this->baggageTicketCounter = $baggageTicketCounter;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        $baggageInfo = $this->baggageTicketCounter
            ? sprintf('Baggage drop at ticket counter %s.', $this->baggageTicketCounter)
            : 'Baggage will we automatically transferred from your last leg.';

        return sprintf(
            "From %s, take flight %s to %s. Gate %s, seat %s.\n%s",
            $this->departure,
            $this->flight,
            $this->arrival,
            $this->gate,
            $this->seat,
            $baggageInfo
        );
    }
}