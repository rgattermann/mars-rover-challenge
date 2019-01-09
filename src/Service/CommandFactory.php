<?php

namespace MarsRover\Service;

use InvalidArgumentException;
use MarsRover\Model\{CommandTypes, Move, SpinLeft, SpinRight};
use MarsRover\Interfaces\Command;

class CommandFactory
{
    public function createCommand(string $commandType): Command
    {
        switch ($commandType) {
            case CommandTypes::MOVE:
                return new Move;
            case CommandTypes::SPIN_RIGHT:
                return new SpinRight;
            case CommandTypes::SPIN_LEFT:
                return new SpinLeft;
            default:
                throw new InvalidArgumentException($commandType . ' is a invalid command type');
        }
    }
}
