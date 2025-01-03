<?php

namespace Tests\Feature;

use App\Core\TennisFemalePlayer;
use App\Core\TennisMalePlayer;
use App\Core\TennisMatch;
use App\Core\TennisPlayerFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertContains;
use function PHPUnit\Framework\assertInstanceOf;
use function PHPUnit\Framework\assertIsInt;
use function PHPUnit\Framework\assertIsObject;

class TennisMatchTest extends TestCase
{
    public function test_match_can_decide_a_winner(): void
    {
        $player1 = TennisPlayerFactory::createPlayer('Juan', "m", [
            "skill" => 50,
            "strength"  => 40,
            "speed" => 80
        ]);
        $player2 = TennisPlayerFactory::createPlayer('Pedro', "m", [
            "skill" => 60,
            "strength"  => 85,
            "speed" => 55
        ]);
        $match = new TennisMatch($player1, $player2);
        assertContains($match->decideWinner(), [$player1, $player2]);
    }
}
