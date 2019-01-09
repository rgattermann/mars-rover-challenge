<?php

namespace MarsRover\Test\Model;

use MarsRover\Model\{Plateau, Coordinate, Rover, RoverSetup};
use MarsRover\Service\CommandFactory;
use PHPUnit\Framework\TestCase;

class SpinLeftTest extends TestCase
{
    public function testSpinCorrectly()
    {
        $plateau = new Plateau(new Coordinate(5, 5));
        $rover = new Rover($plateau);
        $rover->setSetup(new RoverSetup('1 1 S'));

        $spinLeft = (new CommandFactory)->createCommand('L');
        $spinLeft->execute($rover);

        $this->assertEquals('E', $rover->getSetup()->getDirection()->getOrientation());
    }
}
