<?php

namespace TripSorter;

use PHPUnit\Framework\TestCase;
use TripSorter\BoardingCard\BusBoardingCard;
use TripSorter\BoardingCard\Contract\BoardingCardInterface;
use TripSorter\BoardingCard\FlightBoardingCard;
use TripSorter\BoardingCard\TrainBoardingCard;
use TripSorter\Destination\Destination;

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
        $madrid = new Destination('Madrid');
        $barcelona = new Destination('Barcelona');
        $geronaAirport = new Destination('Gerona Airport');
        $stockholm = new Destination('Stockholm');
        $newYorkJFK = new Destination('New York JFK');

        $this->startingBoardingCard = new TrainBoardingCard($madrid, $barcelona, '45B', '78A');

        $this->firstStopBoardingCard = new BusBoardingCard($barcelona, $geronaAirport, null, 'the airport');

        $this->secondStopBoardingCard = new FlightBoardingCard($geronaAirport, $stockholm, '3A', 'SK455', '45B', '344');

        $this->lastBoarding = new FlightBoardingCard($stockholm, $newYorkJFK, '7B', 'SK22', '22', null);
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