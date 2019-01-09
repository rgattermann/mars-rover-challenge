<?php

namespace MarsRover\Test\Model;

use MarsRover\Model\{Coordinate, Plateau};
use PHPUnit\Framework\TestCase;

class PlateauTest extends TestCase
{
    public function testCoordinateX()
    {
        $plateau = new Plateau(new Coordinate(11, 2));
        $this->assertSame(11, $plateau->getCoordinate()->getX());
    }

    public function testCoordinateY()
    {
        $plateau = new Plateau(new Coordinate(32, 14));
        $this->assertSame(14, $plateau->getCoordinate()->getY());
    }
}
