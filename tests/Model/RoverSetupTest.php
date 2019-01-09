<?php

namespace MarsRover\Test\Model;

use MarsRover\Model\{Coordinate, Direction, RoverSetup};
use PHPUnit\Framework\TestCase;

class RoverSetupTest extends TestCase
{
    private $roverSetup;

    public function testParseInputString()
    {
        $this->roverSetup = new RoverSetup('3 3 E');
        $this->assertTrue(
            $this->roverSetup->getCoordinate() instanceof Coordinate &&
            $this->roverSetup->getDirection() instanceof Direction
        );
    }

    public function testParseSetupOutput()
    {
        $this->roverSetup = new RoverSetup('3 3 E');
        $this->assertEquals('3 3 E', $this->roverSetup->printInstructions());
    }
}
