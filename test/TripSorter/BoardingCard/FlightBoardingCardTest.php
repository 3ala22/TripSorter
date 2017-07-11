<?php

use TripSorter\BoardingCard\FlightBoardingCard;
use TripSorter\Destination\Destination;

class FlightBoardingCardTest extends \PHPUnit\Framework\TestCase
{

    public function testMessageWithNoTicketCounter()
    {
        $expectedString = <<<EOD
From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B.
Baggage will we automatically transferred from your last leg.
EOD;

        $flightBoardingCard = new FlightBoardingCard(new Destination('Stockholm'), new Destination('New York JFK'), '7B', 'SK22', '22', null);

        $this->assertEquals($flightBoardingCard->__toString(), $expectedString);
    }

    public function testMessageWithTicketCounter()
    {
        $expectedString = <<<EOD
From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A.
Baggage drop at ticket counter 344.
EOD;

        $flightBoardingCard = new FlightBoardingCard(new Destination('Gerona Airport'), new Destination('Stockholm'), '3A', 'SK455', '45B', '344');

        $this->assertEquals($flightBoardingCard->__toString(), $expectedString);
    }
}