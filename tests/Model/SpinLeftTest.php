<?php

namespace MarsRover\Test\Model;

use MarsRover\Model\{Rover, RoverSetup};
use MarsRover\Service\CommandFactory;
use PHPUnit\Framework\TestCase;

class SpinLeftTest extends TestCase
{
    public function testSpinCorrectly()
    {
        $rover = new Rover;
        $rover->setSetup(new RoverSetup('1 1 S'));

        $spinLeft = (new CommandFactory)->createCommand('L');
        $spinLeft->execute($rover);

        $this->assertEquals('E', $rover->getSetup()->getDirection()->getOrientation());
    }
}
