<?php

namespace TripSorter;

use TripSorter\BoardingCard\Contract\BoardingCardInterface;

class TripSorter
{
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
            $destinationsMap[(string) $boardingCard->getArrival()] = true;
            $tripMap[(string) $boardingCard->getDeparture()] = $boardingCard;
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
        $next = $tripMap[(string) $first->getArrival()];

        while ($next) {
            array_push($sortedCards, $next);
            $arrival = (string) $next->getArrival();
            if (array_key_exists($arrival, $tripMap))
                $next = $tripMap[$arrival];
            else
                $next = null; // we reached end of trip
        }

        return $sortedCards;
    }
}