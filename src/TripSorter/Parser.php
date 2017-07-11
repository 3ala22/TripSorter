<?php

namespace TripSorter;

use TripSorter\BoardingCard\BusBoardingCard;
use TripSorter\BoardingCard\FlightBoardingCard;
use TripSorter\BoardingCard\TrainBoardingCard;
use TripSorter\Destination\Destination;

/**
 * Parser class
 *
 * @package TripSorter\Parser
 */
class Parser
{

    /**
     * parse an array of raw boarding cards data.
     *
     * @param array $rawBoardingCards
     * @return array
     */
    public static function parse(array $rawBoardingCards)
    {
        $boardingCards = [];
        foreach ($rawBoardingCards as $boardingCard) {
            $type = $boardingCard['Type'];

            $departure = new Destination($boardingCard['Departure']);
            $arrival = new Destination($boardingCard['Arrival']);

            switch ($type) {
                case 'Bus':
                    array_push($boardingCards, new BusBoardingCard(
                        $departure,
                        $arrival,
                        array_key_exists('Seat', $boardingCard) ? $boardingCard['Seat'] : null,
                        $boardingCard['Bus']
                    ));
                    break;
                case 'Train':
                    array_push($boardingCards, new TrainBoardingCard(
                        $departure,
                        $arrival,
                        $boardingCard['Seat'],
                        $boardingCard['Train']
                    ));
                    break;
                case 'Flight':
                    array_push($boardingCards, new FlightBoardingCard(
                        $departure,
                        $arrival,
                        $boardingCard['Seat'],
                        $boardingCard['Flight'],
                        $boardingCard['Gate'],
                        array_key_exists('BaggageTicketCounter', $boardingCard) ? $boardingCard['BaggageTicketCounter'] : null
                    ));
                    break;
                default:
                    break;
            }
        }

        return $boardingCards;

    }
}