<?php

namespace App\Core;

class TennisFemalePlayer extends TennisPlayer
{
    protected int $reaction;

    public function __construct($name, $skill, $reaction)
    {
        parent::__construct($name, 'f', $skill);
        $this->reaction = $reaction;
    }

    public function getStats()
    {
        return [
            "skill" => $this->skill,
            "reaction" => $this->reaction,
        ];
    }

    public function perform($luck_factor = 0.5): int
    {
        $stats = ($this->skill + $this->reaction) / 2;
        return (int)round(($luck_factor * rand(0, 100) + (1 - $luck_factor) * $stats) / 2);
    }
}
