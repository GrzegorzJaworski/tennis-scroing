<?php

namespace spec\Acme;

use Acme\Player;
use Acme\Tennis;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TennisSpec extends ObjectBehavior
{

    private $player1;
    private $player2;

    function let()
    {
        $this->player1 = new Player('Jan Testowski', 0);
        $this->player2 = new Player('Pawel Malinowski', 0);

        $this->beConstructedWith($this->player1, $this->player2);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(Tennis::class);
    }

    function it_scores_a_scoreless_game()
    {
        $this->score()->shouldReturn('Love-All');
    }

    function it_scores_a_1_0_game()
    {
        $this->player1->earnPoints(1);
        $this->score()->shouldReturn('Fifteen-Love');
    }

    function it_scores_a_2_0_game()
    {
        $this->player1->earnPoints(2);
        $this->score()->shouldReturn('Thirty-Love');
    }

    function it_scores_a_3_0_game()
    {
        $this->player1->earnPoints(3);
        $this->score()->shouldReturn('Forty-Love');
    }
}
