<?php

namespace MarsRover\Test\Model;

use InvalidArgumentException;
use MarsRover\Model\Direction;
use PHPUnit\Framework\TestCase;

class DirectionTest extends TestCase
{
    public function testValidOrientation()
    {
        $direction = 'N';

        $this->assertSame($direction, (new Direction($direction))->getOrientation());
    }

    public function testThrowsExceptionInvalidOrientation()
    {
        $this->expectException(InvalidArgumentException::class);
        new Direction('NE');
    }
}
