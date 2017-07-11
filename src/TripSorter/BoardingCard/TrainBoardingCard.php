<?php
/**
 * Created by PhpStorm.
 * User: alahawash
 * Date: 7/10/17
 * Time: 7:51 PM
 */

namespace TripSorter\BoardingCard;
use TripSorter\Destination\DestinationInterface;

/**
 * Train Boarding Card
 *
 * @package TripSorter\BoardingCard
 */
class TrainBoardingCard extends AbstractBoardingCard
{

    /**
     * @var string
     */
    protected $train;

    /**
     * TrainBoardingCard constructor.
     * @param DestinationInterface $departure
     * @param DestinationInterface $arrival
     * @param string $seat
     * @param string $train
     */
    public function __construct(DestinationInterface $departure, DestinationInterface $arrival, $seat, $train)
    {
        parent::__construct($departure, $arrival, $seat);

        $this->train = $train;
    }

    /**
     * Get train number.
     *
     * @return string
     */
    public function getTrain()
    {
        return $this->train;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return sprintf(
            "Take train %s from %s to %s. Sit in seat %s.",
            $this->train,
            $this->departure,
            $this->arrival,
            $this->seat
        );
    }
}