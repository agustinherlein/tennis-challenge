<?php

namespace Tests\Feature;

use App\Core\TennisFemalePlayer;
use App\Core\TennisMalePlayer;
use App\Core\TennisPlayer;
use App\Core\TennisPlayerFactory;
use App\Core\TennisTournament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use InvalidArgumentException;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertInstanceOf;
use function PHPUnit\Framework\assertIsInt;
use function PHPUnit\Framework\assertIsObject;

class TennisTournamentTest extends TestCase
{
    private function generatePlayer($gender): TennisPlayer
    {
        return TennisPlayerFactory::createPlayer('Alex', $gender, [
            'skill' => rand(0, 100),
            'speed' => rand(0, 100),
            'strength' => rand(0, 100),
            'reaction' => rand(0, 100)
        ]);
    }


    private function generatePlayersArray($number, $gender): array
    {
        $players = [];
        for ($i = 0; $i < $number; $i++) {
            $players[] = $this->generatePlayer($gender);
        }
        return $players;
    }

    public function test_can_create_tournament_and_add_players()
    {
        $tournament = new TennisTournament(8, 'm');
        assertInstanceOf(TennisTournament::class, $tournament);

        $players = $this->generatePlayersArray(8, 'm');
        $tournament->setPlayers($players);
        assertEquals($tournament->getPlayers(), $players);
    }

    public function test_elimination_stage()
    {
        $tournament = new TennisTournament(8, 'f');
        assertInstanceOf(TennisTournament::class, $tournament);
        $players = $this->generatePlayersArray(8, 'f');
        $tournament->setPlayers($players);
        $tournament->playEliminationStage();
        $initial_number = $tournament->getNumberOfPlayers();
        $remaining_number = count($tournament->getRemainingPlayers());

        assertEquals($remaining_number, $initial_number / 2);
    }
}
