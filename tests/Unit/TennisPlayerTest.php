<?php

namespace Tests\Feature;

use App\Core\TennisFemalePlayer;
use App\Core\TennisMalePlayer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertIsInt;
use function PHPUnit\Framework\assertIsObject;

class TennisPlayerTest extends TestCase
{
    public function test_male_player_perform_method_returns_an_integer(): void
    {
        $player = new TennisMalePlayer(75, 60, 85);
        assertIsObject($player);
        assertEquals($player->getGender(), 'm');
        assertIsInt($player->perform());
    }

    public function test_female_player_perform_method_returns_an_integer(): void
    {
        $player = new TennisFemalePlayer(75, 80);
        assertIsObject($player);
        assertEquals($player->getGender(), 'f');
        assertIsInt($player->perform());
    }
}
