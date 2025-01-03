<?php

namespace App\Http\Controllers;

use App\Core\TennisPlayer;
use App\Core\TennisPlayerFactory;
use App\Core\TennisTournament;
use App\Models\Gender;
use App\Services\TennisService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class TennisController extends BaseApiController
{
    protected TennisService $tennis_service;

    public function __construct(TennisService $tennis_service)
    {
        $this->tennis_service = $tennis_service;
    }

    public function simulate(Request $request)
    {
        try {
            $validated = $request->validate(
                [
                    "players" => "array|required",
                    "gender" => "string|required"
                ]
            );

            $winner = $this->tennis_service->simulateTournament($validated['players'], $validated['gender']);
            $data = [
                "date" => date("Y-m-d"),
                "winner" => $winner->getName()
            ];

            // $data = ["pongo" => "pingo"];

            return $this->sendResponse($data, "The tournament was simulated successfully");
        } catch (\Throwable $th) {
            $this->sendError('Cannot simulate the tournament: ' . $th->getMessage());
        }
    }
}
