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
        $score = $this->lookup[$this->player1->getPoints()].'-';
        $score .= $this->tied() ? 'All' : $this->lookup[$this->player2->getPoints()];

        return $score;
    }

    private function tied()
    {
        return $this->player1->getPoints() == $this->player2->getPoints();
    }
}
