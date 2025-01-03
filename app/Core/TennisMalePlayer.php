<?php

namespace App\Core;

class TennisMalePlayer extends TennisPlayer
{
    protected int $strength;
    protected int $speed;

    public function __construct($name, $skill, $speed, $strength)
    {
        parent::__construct($name, 'm', $skill);
        $this->speed = $speed;
        $this->strength = $strength;
    }

    public function getStats()
    {
        return [
            "skill" => $this->skill,
            "speed" => $this->speed,
            "strength" => $this->strength,
        ];
    }

    public function perform($luck_factor = 0.5): int
    {
        $stats = ($this->skill + $this->strength + $this->speed) / 3;
        return (int)round(($luck_factor * rand(0, 100) + (1 - $luck_factor) * $stats) / 2);
    }
}
