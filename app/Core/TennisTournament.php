<?php

namespace App\Core;

use Exception;
use InvalidArgumentException;

class TennisTournament
{
    protected int $number_of_players;
    protected string $gender;
    protected array $players = [];
    protected array $remaining_players = [];

    public function __construct(int $number_of_players, string $gender)
    {
        // Check if the number of players is a power of two
        if ((($number_of_players - 1) && $number_of_players) == 0) {
            throw new InvalidArgumentException("number of players must be a power of two (for example: 4, 8 or 16)");
        }
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

    public function getRemainingPlayers()
    {
        return $this->remaining_players;
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
        $count = count($players);
        if (!$count == $this->number_of_players) {
            throw new InvalidArgumentException("The array contains " . $count . " players. This tournament must have " . $this->number_of_players . " players.");
        }

        $this->players = [];
        foreach ($players as $player) {
            $this->addPlayer($player);
        }
        $this->remaining_players = $this->players;
    }

    // Eliminates half of the players by playing matches between them
    public function playEliminationStage()
    {
        if (count($this->remaining_players) == 1) {
            // If there is only one player, it is the winner
            return $this->remaining_players[0];
        }

        $winners = [];
        for ($i = 0; $i < count($this->remaining_players); $i += 2) {
            $match = new TennisMatch($this->remaining_players[$i], $this->remaining_players[$i + 1]);
            $winners[] = $match->decideWinner();
        }

        $this->remaining_players = $winners;
    }

    // Simulates all the stages of the tournament and returns a winner
    public function playTournament(): TennisPlayer
    {
        if ($this->remaining_players == []) {
            $this->remaining_players = $this->players;
        }

        while (count($this->remaining_players) > 1) {
            $this->playEliminationStage();
        }

        return $this->remaining_players[0];
    }
}
