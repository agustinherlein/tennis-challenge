<?php

namespace App\Core;

use InvalidArgumentException;

class TennisPlayerFactory
{
    // Creates an instance of TennisPlayer of the specified type
    public static function createPlayer(string $name, string $gender, array $stats): TennisPlayer
    {
        switch ($gender) {
            case 'm':
                return new TennisMalePlayer($name, $stats['skill'], $stats['speed'], $stats['strength']);
                break;
            case 'f':
                return new TennisFemalePlayer($name, $stats['skill'], $stats['reaction']);
                break;
            default:
                return new InvalidArgumentException('Cannot create a player with the gender code ' . $gender);
                break;
        }
    }
}
