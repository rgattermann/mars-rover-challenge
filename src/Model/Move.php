<?php

namespace MarsRover\Model;

use MarsRover\Model\{Direction, Rover, RoverSetup};
use MarsRover\Interfaces\Command;
use MarsRover\Service\Input;

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
                $coordinateY = ($coordinateY + self::MOVEMENT_FACTOR);
                $newSetup = $this->newSetupString($coordinateX, $coordinateY, $orientation);
                break;
            case Direction::WEST:
                $coordinateX = ($coordinateX - self::MOVEMENT_FACTOR);
                $newSetup = $this->newSetupString($coordinateX, $coordinateY, $orientation);
                break;
            case Direction::EAST:
                $coordinateX = ($coordinateX + self::MOVEMENT_FACTOR);
                $newSetup = $this->newSetupString($coordinateX, $coordinateY, $orientation);
                break;
            case Direction::SOUTH:
                $coordinateY = ($coordinateY - self::MOVEMENT_FACTOR);
                $newSetup = $this->newSetupString($coordinateX, $coordinateY, $orientation);
                break;
            default:
                throw new InvalidArgumentException($orientation . ' is a invalid orientation direction');
        }
        
        $rover->setSetup(new RoverSetup($newSetup));
    }

    private function newSetupString(int $coordX, int $coordY, string $orientation): string
    {
        return $coordX . Input::CMD_SEPARATOR . $coordY . Input::CMD_SEPARATOR . $orientation;
    }
}
