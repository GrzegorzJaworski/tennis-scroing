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

    function it_scores_a_4_0_game()
    {
        $this->player1->earnPoints(4);
        $this->score()->shouldReturn('Win for Jan Testowski');
    }

    function it_scores_a_0_4_game()
    {
        $this->player2->earnPoints(4);
        $this->score()->shouldReturn('Win for Pawel Malinowski');
    }

    function it_scores_a_4_3_game()
    {
        $this->player1->earnPoints(4);
        $this->player2->earnPoints(3);
        $this->score()->shouldReturn('Advantage Jan Testowski');
    }

    function it_scores_a_3_4_game()
    {
        $this->player1->earnPoints(3);
        $this->player2->earnPoints(4);
        $this->score()->shouldReturn('Advantage Pawel Malinowski');
    }

    function it_scores_a_3_3_game()
    {
        $this->player1->earnPoints(3);
        $this->player2->earnPoints(3);
        $this->score()->shouldReturn('Deuce');
    }

    function it_scores_a_5_5_game()
    {
        $this->player1->earnPoints(5);
        $this->player2->earnPoints(5);
        $this->score()->shouldReturn('Deuce');
    }

    function it_scores_a_8_9_game()
    {
        $this->player1->earnPoints(8);
        $this->player2->earnPoints(9);
        $this->score()->shouldReturn('Advantage Pawel Malinowski');
    }

    function it_scores_a_8_10_game()
    {
        $this->player1->earnPoints(8);
        $this->player2->earnPoints(10);
        $this->score()->shouldReturn('Win for Pawel Malinowski');
    }
}
