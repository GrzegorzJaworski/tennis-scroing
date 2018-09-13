<?php
/**
 * Created by PhpStorm.
 * User: Grzesiek
 * Date: 13.09.2018
 * Time: 13:34
 */

namespace Acme;


class Player
{
    private $name;
    private $points;

    public function __construct($name, $score)
    {
        $this->name = $name;
        $this->points = $score;
    }

    public function getPoints()
    {
        return $this->points;
    }


    public function earnPoints($points)
    {
        $this->points = $points;
    }
}