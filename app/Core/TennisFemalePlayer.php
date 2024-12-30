<?php

namespace App\Core;

class TennisFemalePlayer extends TennisPlayer
{
    protected int $reaction;

    public function __construct($skill, $reaction)
    {
        parent::__construct('f', $skill);
        $this->reaction = $reaction;
    }

}