<?php

namespace App\Services;

use App\Models\Gender;
use App\Models\Tournament;
use Exception;

class DatabaseTournamentService
{
    public function createTournament($data)
    {
        $tournament = new Tournament();
        $gender = Gender::where('cod', $data->gender_cod)->first();
        if (!$gender) {
            throw new Exception('Invalid gender code');
        }
        $tournament->date = $data['date'];
        $tournament->gender_id = $gender->id;
        $tournament->number_of_players = $data['number_of_players'];
        $tournament->save();
    }
}
