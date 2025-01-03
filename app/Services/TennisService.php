<?php

namespace App\Services;

use App\Core\TennisPlayerFactory;
use App\Core\TennisTournament;
use App\Models\Tournament;

class TennisService
{
    public function simulateTournament($players, $gender)
    {
        $tournament = new TennisTournament(count($players), $gender);

        foreach ($players as $player) {
            $tournament->addPlayer(TennisPlayerFactory::createPlayer($player['name'], $player['gender'], $player['stats']));
        }
        return $tournament->playTournament();
    }
}
