<?php

use TripSorter\BoardingCard\BusBoardingCard;
use TripSorter\Destination\Destination;

class BusBoardingCardTest extends \PHPUnit\Framework\TestCase
{

    public function testMessageWithSeat()
    {
        $busBoardingCard = new BusBoardingCard(new Destination('Dubai'), new Destination('Abu Dhabi'), '25', 'the airport');

        $this->assertEquals($busBoardingCard->__toString(), 'Take the airport bus from Dubai to Abu Dhabi. Seat 25.');
    }

    public function testMessageWithNoSeat()
    {
        $busBoardingCard = new BusBoardingCard(new Destination('Dubai'), new Destination('Abu Dhabi'), null, 'the airport');

        $this->assertEquals($busBoardingCard->__toString(), 'Take the airport bus from Dubai to Abu Dhabi. No seat assignment.');
    }
}