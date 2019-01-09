<?php

namespace MarsRover\Model;

use MarsRover\Model\{Direction, Rover, RoverSetup};
use MarsRover\Interfaces\Command;

class Move implements Command
{
    const MOVEMENT_FACTOR = 1;

    public function execute(Rover $rover): void
    {
        $setup = $rover->getSetup();
        $coordinateX = $setup->getCoordinate()->getX();
        $coordinateY = $setup->getCoordinate()->getY();
        $orientation = $setup->getDirection()->getOrientation();

        switch ($orientation) {
            case Direction::NORTH:
                $newSetup = $coordinateX . ' ' . ($coordinateY + 1) . ' ' . $orientation;
                break;
            case Direction::WEST:
                $newSetup = ($coordinateX - self::MOVEMENT_FACTOR) . ' ' . $coordinateY . ' ' . $orientation;
                break;
            case Direction::EAST:
                $newSetup = ($coordinateX + self::MOVEMENT_FACTOR) . ' ' . $coordinateY . ' ' . $orientation;
                break;
            case Direction::SOUTH:
                $newSetup = $coordinateX . ' ' . ($coordinateY - self::MOVEMENT_FACTOR) . ' ' . $orientation;
                break;
            default:
                throw new InvalidArgumentException($orientation . ' is a invalid orientation direction');
        }
        
        $rover->setSetup(new RoverSetup($newSetup));
    }
}
