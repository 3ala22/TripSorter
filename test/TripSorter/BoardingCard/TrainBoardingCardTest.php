<?php

use TripSorter\BoardingCard\TrainBoardingCard;
use TripSorter\Destination\Destination;

class TrainBoardingCardTest extends \PHPUnit\Framework\TestCase
{

    public function testMessage()
    {
        $trainBoardingCard = new TrainBoardingCard(new Destination('Madrid'), new Destination('Barcelona'), '45B', '78A');

        $this->assertEquals($trainBoardingCard->__toString(), 'Take train 78A from Madrid to Barcelona. Sit in seat 45B.');
    }
}