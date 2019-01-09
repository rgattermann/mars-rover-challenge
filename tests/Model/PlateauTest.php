<?php

namespace MarsRover\Test\Model\Plateau;

use MarsRover\Model\{Coordinate, Plateau};
use PHPUnit\Framework\TestCase;

class PlateauTest extends TestCase
{
    public function testMinCoordinateX()
    {
        $plateau = new Plateau(new Coordinate(11, 2));
        $this->assertSame(0, $plateau->getMin()->getX());
    }

    public function testMinCoordinateY()
    {
        $plateau = new Plateau(new Coordinate(32, 14));
        $this->assertSame(0, $plateau->getMin()->getY());
    }

    public function testMaxCoordinateX()
    {
        $plateau = new Plateau(new Coordinate(11, 2));
        $this->assertSame(11, $plateau->getMax()->getX());
    }

    public function testMaxCoordinateY()
    {
        $plateau = new Plateau(new Coordinate(32, 14));
        $this->assertSame(14, $plateau->getMax()->getY());
    }
}
