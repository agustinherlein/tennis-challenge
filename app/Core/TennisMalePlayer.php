<?php

namespace App\Core;

class TennisMalePlayer extends TennisPlayer
{
    protected int $strength;
    protected int $speed;

    public function __construct($skill, $speed, $strength)
    {
        parent::__construct('m', $skill);
        $this->speed = $speed;
        $this->strength = $strength;
    }
}