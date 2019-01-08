<?php

namespace MarsRover\Model;

use MarsRover\Model\{Coordinate, Direction};

class RoverSetup
{
    private $coordinate;
    private $direction;

    public function __construct(string $currentSetupInput)
    {
        list($coor1, $coor2, $direction) = explode(' ', $currentSetupInput);

        $this->coordinate = new Coordinate($coor1, $coor2);
        $this->direction = new Direction($direction);
    }

    public function getCoordinate(): Coordinate
    {
        return $this->coordinate;
    }

    public function getDirection(): Direction
    {
        return $this->direction;
    }

    public function printInstructions(): string
    {
        return $this->coordinate->getX() . ' '
            . $this->coordinate->getY() . ' '
            . $this->direction->getOrientation();
    }
}
