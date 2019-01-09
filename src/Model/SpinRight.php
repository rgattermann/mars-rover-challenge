<?php

namespace MarsRover\Model;

use MarsRover\Model\Direction;
use MarsRover\Interfaces\Command;

class SpinRight extends Spinnable implements Command
{
    use \MarsRover\Traits\SpinExecuteTrait;

    protected function spin(string $direction): string
    {
        switch ($direction) {
            case Direction::NORTH:
                return Direction::EAST;
            case Direction::EAST:
                return Direction::SOUTH;
            case Direction::SOUTH:
                return Direction::WEST;
            case Direction::WEST:
                return Direction::NORTH;
            default:
                throw new \InvalidArgumentException($direction . ' is a invalid rotete direction');       
        }
    }
}
