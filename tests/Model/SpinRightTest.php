<?php

namespace MarsRover\Test\Model;

use MarsRover\Model\{Rover, RoverSetup};
use MarsRover\Service\CommandFactory;
use PHPUnit\Framework\TestCase;

class SpinRightTest extends TestCase
{
    public function testSpinCorrectly()
    {
        $rover = new Rover;
        $rover->setSetup(new RoverSetup('1 1 S'));

        $spinLeft = (new CommandFactory)->createCommand('R');
        $spinLeft->execute($rover);

        $this->assertEquals('W', $rover->getSetup()->getDirection()->getOrientation());
    }
}
