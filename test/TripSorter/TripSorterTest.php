<?php

namespace TripSorter;

use PHPUnit\Framework\TestCase;
use TripSorter\BoardingCard\BusBoardingCard;
use TripSorter\BoardingCard\Contract\BoardingCardInterface;
use TripSorter\BoardingCard\FlightBoardingCard;
use TripSorter\BoardingCard\TrainBoardingCard;

class TripSorterTest extends TestCase
{

    /**
     * @var BoardingCardInterface
     */
    protected $startingBoardingCard;

    /**
     * @var BoardingCardInterface
     */
    protected $firstStopBoardingCard;

    /**
     * @var BoardingCardInterface
     */
    protected $secondStopBoardingCard;

    /**
     * @var BoardingCardInterface
     */
    protected $lastBoarding;

    public function setUp()
    {
        $this->startingBoardingCard = new TrainBoardingCard('Madrid', 'Barcelona', '45B', '78A');

        $this->firstStopBoardingCard = new BusBoardingCard('Barcelona', 'Gerona Airport', null, 'the airport');

        $this->secondStopBoardingCard = new FlightBoardingCard('Gerona Airport', 'Stockholm', '3A', 'SK455', '45B', '344');

        $this->lastBoarding = new FlightBoardingCard('Stockholm', 'New York JFK', '7B', 'SK22', '22', null);
    }

    public function testSort()
    {
        $tripSorter = new TripSorter();

        $boardingCards = [
            $this->lastBoarding,
            $this->firstStopBoardingCard,
            $this->startingBoardingCard,
            $this->secondStopBoardingCard
        ];

        $sorted = $tripSorter->sort($boardingCards);

        $this->assertCount(4, $sorted);

        $this->assertEquals($this->startingBoardingCard, $sorted[0]);
        $this->assertEquals($this->firstStopBoardingCard, $sorted[1]);
        $this->assertEquals($this->secondStopBoardingCard, $sorted[2]);
        $this->assertEquals($this->lastBoarding, $sorted[3]);

        shuffle($boardingCards);

        $sorted = $tripSorter->sort($boardingCards);

        $this->assertEquals($this->startingBoardingCard, $sorted[0]);
        $this->assertEquals($this->firstStopBoardingCard, $sorted[1]);
        $this->assertEquals($this->secondStopBoardingCard, $sorted[2]);
        $this->assertEquals($this->lastBoarding, $sorted[3]);
    }
}