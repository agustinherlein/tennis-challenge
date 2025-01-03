<?php

namespace App\Services;

use App\Models\Gender;
use App\Models\Player;
use Exception;

class DatabasePlayerService
{
    public function createPlayer($data)
    {
        $player = new Player();
        $gender = Gender::where('cod', $data->gender_cod)->first();
        if (!$gender) {
            throw new Exception('Invalid gender code');
        }

        $player->gender_id = $gender->id;
        $player->name = $data['name'];
        $player->skill = $data['skill'] ?? 0;
        $player->strength = $data['strength'] ?? 0;
        $player->speed = $data['speed'] ?? 0;
        $player->reaction = $data['reaction'] ?? 0;
        $player->save();
    }
}
