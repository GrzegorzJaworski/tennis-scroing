<?php

namespace Acme;

class Tennis
{
    private $player1;
    private $player2;

    private $lookup = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty',
    ];

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function score()
    {
        if ($this->hasAWinner()){
            return 'Win for '. $this->leader()->getName();
        }

        if ($this->hasTheAdvantage()) {
            return 'Advantage '. $this->leader()->getName();
        }

        if ($this->inDeuce())
        {
            return 'Deuce';
        }

        return $this->generalScore();
    }

    private function tied()
    {
        return $this->player1->getPoints() == $this->player2->getPoints();
    }

    private function hasAWinner()
    {
        return ($this->hasEnoughPointsToBeWon() && $this->isLeadingByAtLeastTwo());
    }

    private function leader()
    {
        return $this->player1->getPoints() > $this->player2->getPoints()
            ? $this->player1
            : $this->player2;
    }

    private function hasEnoughPointsToBeWon()
    {
        return max([$this->player1->getPoints(), $this->player2->getPoints()]) >= 4;
    }

    private function isLeadingByAtLeastTwo()
    {
        return abs($this->player1->getPoints() - $this->player2->getPoints()) >= 2;
    }

    private function hasTheAdvantage()
    {
        return $this->hasEnoughPointsToBeWon() && $this->isLeadingByOne();
    }

    private function inDeuce()
    {
        return $this->player1->getPoints() + $this->player2->getPoints() >= 6 && $this->tied();
    }

    private function generalScore()
    {
        $score = $this->lookup[$this->player1->getPoints()].'-';
        $score .= $this->tied() ? 'All' : $this->lookup[$this->player2->getPoints()];

        return $score;
    }

    private function isLeadingByOne()
    {
        return abs($this->player1->getPoints() - $this->player2->getPoints()) == 1;
    }
}
