<?php

namespace App\Core;

use Exception;

class TennisPlayer
{
    protected string $name;
    protected int $skill;
    protected string $gender;

    public function __construct($name, $gender, $skill)
    {
        if (!is_int($skill) || $skill > 100 || $skill < 0) {
            throw new Exception($skill . "is an invalid skill value. Must be an integer between 0 and 100");
        }
        $this->name = $name;
        $this->gender = $gender;
        $this->skill = $skill;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getSkill()
    {
        return $this->skill;
    }

    // Generate a number to represent the performance of the player on a given match
    public function perform()
    {
        return $this->getSkill();
    }
}
