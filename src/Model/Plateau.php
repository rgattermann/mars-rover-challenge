<?php

namespace MarsRover\Model;

use MarsRover\Model\Coordinate;

class Plateau
{
    private $coordinate;

    public function __construct(Coordinate $c)
    {
        $this->coordinate = $c;
    }

    public function getCoordinate(): Coordinate
    {
        return $this->coordinate;
    }
}