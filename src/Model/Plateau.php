<?php

namespace MarsRover\Model;

use MarsRover\Model\Coordinate;

class Plateau
{
    private $min;
    private $max;

    public function __construct(Coordinate $max)
    {
        $this->max = $max;
        $this->min = new Coordinate(0, 0);
    }

    public function getMin(): Coordinate
    {
        return $this->min;
    }

    public function getMax(): Coordinate
    {
        return $this->max;
    }
}