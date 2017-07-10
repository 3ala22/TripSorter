<?php

namespace TripSorter;

use TripSorter\BoardingCard\BusBoardingCard;
use TripSorter\BoardingCard\Contract\BoardingCardInterface;
use TripSorter\BoardingCard\FlightBoardingCard;
use TripSorter\BoardingCard\TrainBoardingCard;

class TripSorter
{

    public function parse(array $rawBoardingCards)
    {
        $boardingCards = [];
        foreach ($rawBoardingCards as $boardingCard) {
            $type = $boardingCard['Type'];

            switch ($type) {
                case 'Bus':
                    array_push($boardingCards, new BusBoardingCard(
                        $boardingCard['Departure'],
                        $boardingCard['Arrival'],
                        array_key_exists('Seat', $boardingCard) ? $boardingCard['Seat'] : null,
                        $boardingCard['Bus']
                    ));
                    break;
                case 'Train':
                    array_push($boardingCards, new TrainBoardingCard(
                        $boardingCard['Departure'],
                        $boardingCard['Arrival'],
                        $boardingCard['Seat'],
                        $boardingCard['Train']
                    ));
                    break;
                case 'Flight':
                    array_push($boardingCards, new FlightBoardingCard(
                        $boardingCard['Departure'],
                        $boardingCard['Arrival'],
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

    /**
     * Sort a set of unordered boarding cards.
     *
     * @param array $boardingCards
     * @return array
     */
    public function sort(array $boardingCards)
    {
        // trip map holding all legs with departures as keys.
        $tripMap = [];

        // destinations map that contain only destinations
        // the missing leg from this map is the starting leg.
        $destinationsMap = [];

        // fill maps.
        /** @var BoardingCardInterface $boardingCard */
        foreach ($boardingCards as $boardingCard) {
            $destinationsMap[$boardingCard->getArrival()] = true;
            $tripMap[$boardingCard->getDeparture()] = $boardingCard;
        }

        // find first leg.
        $first = null;
        foreach ($tripMap as $departure => $card) {
            if (!array_key_exists($departure, $destinationsMap)) {
                $first = $card;
                break;
            }

        }
        if (!$first)
            return [];

        // we found first, we now follow the trip map to fill the sorted array.
        $sortedCards = [$first];
        $next = $tripMap[$first->getArrival()];

        while ($next) {
            array_push($sortedCards, $next);
            $arrival = $next->getArrival();
            if (array_key_exists($arrival, $tripMap))
                $next = $tripMap[$arrival];
            else
                $next = null; // we reached end of trip
        }

        return $sortedCards;
    }
}