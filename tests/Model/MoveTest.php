<?php

namespace MarsRover\Test\Model;

use MarsRover\Model\{Coordinate, Plateau, Rover, RoverSetup};
use MarsRover\Service\CommandFactory;
use MarsRover\Collections\CommandCollection;
use MarsRover\Exceptions\OutOfPlateauRange;
use PHPUnit\Framework\TestCase;

class MoveTest extends TestCase
{
    public function testMoveCorrectly()
    {
        $cmdCollection = new CommandCollection;
        $cmdCollection->append((new CommandFactory)->createCommand('M'));

        $plateau = new Plateau(new Coordinate(5, 5));
        $rover = new Rover($plateau);
        $rover->setSetup(new RoverSetup('1 1 S'));
        $rover->setCommands($cmdCollection);
        $rover->execute();

        $this->expectOutputString('1 0 S');
        echo $rover->printSetup();
    }

    public function testMoveOutPlateau()
    {
        $this->expectException(OutOfPlateauRange::class);
        $cmdCollection = new CommandCollection;
        $cmdCollection->append((new CommandFactory)->createCommand('M'));
        $cmdCollection->append((new CommandFactory)->createCommand('M'));
        $cmdCollection->append((new CommandFactory)->createCommand('M'));
        $cmdCollection->append((new CommandFactory)->createCommand('M'));

        $plateau = new Plateau(new Coordinate(5, 2));
        $rover = new Rover($plateau);
        $rover->setSetup(new RoverSetup('1 1 S'));
        $rover->setCommands($cmdCollection);
        $rover->execute();
    }
}
