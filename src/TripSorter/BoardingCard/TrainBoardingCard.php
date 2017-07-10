<?php
/**
 * Created by PhpStorm.
 * User: alahawash
 * Date: 7/10/17
 * Time: 7:51 PM
 */

namespace TripSorter\BoardingCard;

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
     * @param string $departure
     * @param string $arrival
     * @param string $seat
     * @param string $train
     */
    public function __construct($departure, $arrival, $seat, $train)
    {
        parent::__construct($departure, $arrival, $seat);

        $this->train = $train;
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