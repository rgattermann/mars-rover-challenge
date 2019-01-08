<?php

namespace MarsRover\Test\Model\Rover;

use MarsRover\Model\{Rover, RoverSetup};
use PHPUnit\Framework\TestCase;

class RoverTest extends TestCase
{
    public function setUp()
    {
        $this->rover = new Rover;
    }

    public function testRoverCreation()
    {
        $this->assertTrue($this->rover instanceof Rover);
    }

    public function testRoverSetup()
    {
        $this->rover->setSetup(new RoverSetup('3 3 E'));
        $this->assertTrue($this->rover->getSetup() instanceof RoverSetup);
    }
}
