<?php

namespace Tests\Feature;

use App\Core\TennisPlayer;
use App\Services\TennisService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertInstanceOf;

class TennisServiceTest extends TestCase
{
    public function test_simulate_tournament(): void
    {
        $tennisService = new TennisService;
        $players = [
            [
                "name" => "juan",
                "gender" => "m",
                "stats" => [
                    "skill" => 80,
                    "strength" => 60,
                    "speed" => 50
                ]
            ],
            [
                "name" => "lucas",
                "gender" => "m",
                "stats" => [
                    "skill" => 50,
                    "strength" => 50,
                    "speed" => 30
                ]
            ],
            [
                "name" => "federico",
                "gender" => "m",
                "stats" => [
                    "skill" => 70,
                    "strength" => 80,
                    "speed" => 40
                ]
            ],
            [
                "name" => "roberto",
                "gender" => "m",
                "stats" => [
                    "skill" => 80,
                    "strength" => 60,
                    "speed" => 50
                ]
            ]
        ];
        $winner = $tennisService->simulateTournament($players, 'm');
        assertInstanceOf(TennisPlayer::class, $winner);
    }
}
