<?php

namespace Tests\Feature;

use App\Core\TennisFemalePlayer;
use App\Core\TennisMalePlayer;
use App\Core\TennisTournament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertInstanceOf;
use function PHPUnit\Framework\assertIsInt;
use function PHPUnit\Framework\assertIsObject;

class TennisTournamentTest extends TestCase
{
    private function generateMalePlayer(): TennisMalePlayer
    {
        return new TennisMalePlayer(rand(1, 100), rand(1, 100), rand(1, 100));
    }

    private function generateFemalePlayer(): TennisFemalePlayer
    {
        return new TennisFemalePlayer(rand(1, 100), rand(1, 100));
    }

    public function test_can_create_tournament_and_add_players()
    {
        $tournament = new TennisTournament(8, 'm');
        assertInstanceOf(TennisTournament::class, $tournament);
        $players = [];
        for ($i = 0; $i < $tournament->getNumberOfPlayers(); $i++) {
            $players[] = $this->generateMalePlayer();
        }

        $tournament->setPlayers($players);
        assertEquals($tournament->getPlayers(), $players);
    }
}
