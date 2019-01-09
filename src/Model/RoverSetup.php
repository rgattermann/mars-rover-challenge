<?php

namespace MarsRover\Model;

use MarsRover\Model\{Coordinate, Direction};

class RoverSetup
{
    private $coordinate;
    private $direction;

    public function __construct(string $currentSetupInput)
    {
        list($coord1, $coord2, $direction) = explode(' ', $currentSetupInput);

        $this->coordinate = new Coordinate($coord1, $coord2);
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
