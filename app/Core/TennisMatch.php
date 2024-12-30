<?php

namespace App\Core;

class TennisMatch
{
    protected TennisPlayer $player1;
    protected TennisPlayer $player2;

    public function __construct(TennisPlayer $player1, TennisPlayer $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    // Simulates the match between the players returns the winner
    public function decideWinner(): TennisPlayer
    {
        $performance_1 = $this->player1->perform();
        $performance_2 = $this->player2->perform();

        // The winner is the player with the highest performance
        if ($performance_1 > $performance_2) {
            return $this->player1;
        } elseif ($performance_2 > $performance_1) {
            return $this->player2;
        }

        // If they are equal, choose the winner randomly
        return rand(0, 1) ? $this->player1 : $this->player2;
    }
}
