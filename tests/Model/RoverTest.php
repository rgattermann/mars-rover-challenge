<?php

namespace MarsRover\Test\Model;

use MarsRover\Model\{Plateau, Coordinate, Rover, RoverSetup};
use MarsRover\Exceptions\OutOfPlateauRange;
use PHPUnit\Framework\TestCase;

class RoverTest extends TestCase
{
    public function setUp()
    {
        $plateau = new Plateau(new Coordinate(5, 5));
        $this->rover = new Rover($plateau);
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

    public function testRoverSetupOutPlateau()
    {
        $this->expectException(OutOfPlateauRange::class);
        $plateau = new Plateau(new Coordinate(5, 5));
        $rover = new Rover($plateau);
        $rover->setSetup(new RoverSetup('1 6 S'));
    }
}
