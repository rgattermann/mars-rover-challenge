<?php

namespace MarsRover\Test\Model;

use MarsRover\Model\{Rover, RoverSetup};
use MarsRover\Service\CommandFactory;
use MarsRover\Collections\CommandCollection;
use PHPUnit\Framework\TestCase;

class MoveTest extends TestCase
{
    public function testMoveCorrectly()
    {
        $cmdCollection = new CommandCollection;
        $cmdCollection->append((new CommandFactory)->createCommand('M'));

        $rover = new Rover;
        $rover->setSetup(new RoverSetup('1 1 S'));
        $rover->setCommands($cmdCollection);
        $rover->execute();

        $this->expectOutputString('1 0 S');
        echo $rover->printSetup();
    }
}
