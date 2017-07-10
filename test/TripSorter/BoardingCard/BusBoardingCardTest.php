<?php

use TripSorter\BoardingCard\BusBoardingCard;

class BusBoardingCardTest extends \PHPUnit\Framework\TestCase
{

    public function testMessageWithSeat()
    {
        $busBoardingCard = new BusBoardingCard('Dubai', 'Abu Dhabi', '25', 'the airport');

        $this->assertEquals($busBoardingCard->__toString(), 'Take the airport bus from Dubai to Abu Dhabi. Seat 25.');
    }

    public function testMessageWithNoSeat()
    {
        $busBoardingCard = new BusBoardingCard('Dubai', 'Abu Dhabi', null, 'the airport');

        $this->assertEquals($busBoardingCard->__toString(), 'Take the airport bus from Dubai to Abu Dhabi. No seat assignment.');
    }
}