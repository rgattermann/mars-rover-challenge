<?php

namespace MarsRover\Test\Model\Rover;

use MarsRover\Model\Rover;
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
}
