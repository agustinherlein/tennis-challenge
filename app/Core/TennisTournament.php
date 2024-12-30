<?php

namespace App\Core;

use Exception;
use InvalidArgumentException;

class TennisTournament
{
    protected int $number_of_players;
    protected string $gender;
    protected array $players = [];

    public function __construct($number_of_players, $gender)
    {
        $this->number_of_players = $number_of_players;
        $this->gender = $gender;
    }

    public function getNumberOfPlayers()
    {
        return $this->number_of_players;
    }

    public function getPlayers()
    {
        return $this->players;
    }

    // Returns a boolean value indicating if the player is allowed to play in this tournament
    public function canPlayThisTournament(TennisPlayer $player): bool
    {
        return $this->gender == $player->getGender();
    }

    // Adds a TennisPlayer instance to the players array
    public function addPlayer(TennisPlayer $player): void
    {
        if (!$this->canPlayThisTournament($player)) {
            throw new Exception("Cannot add player. This player is not allowed to play in this tournament");
        }

        if (count($this->players) == $this->number_of_players) {
            throw new Exception("Cannot add player. The tournament already contains the maximum number of players");
        }

        $this->players[] = $player;
    }

    // Sets the players array to the one passed as argument
    public function setPlayers(array $players): void
    {
        if (!sizeof($players) == $this->number_of_players) {
            throw new InvalidArgumentException("The array contains " . sizeof($players) . " players. This tournament must have " . $this->number_of_players . " players.");
        }
        $this->players = [];
        foreach ($players as $player) {
            $this->addPlayer($player);
        }
    }
}
