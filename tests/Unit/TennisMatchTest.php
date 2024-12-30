<?php

namespace Tests\Feature;

use App\Core\TennisFemalePlayer;
use App\Core\TennisMalePlayer;
use App\Core\TennisMatch;
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
        $player1 = new TennisMalePlayer(50, 40, 80);
        $player2 = new TennisMalePlayer(60, 85, 55);
        $match = new TennisMatch($player1, $player2);
        assertContains($match->decideWinner(), [$player1, $player2]);
    }
}
