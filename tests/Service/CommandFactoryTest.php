<?php

namespace MarsRover\Test\Service;

use InvalidArgumentException;
use MarsRover\Model\{Move, SpinLeft, SpinRight};
use MarsRover\Service\CommandFactory;
use PHPUnit\Framework\TestCase;

class CommandFactoryTest extends TestCase
{
    public function testSpinLeftCreated()
    {
        $this->assertTrue((new CommandFactory)->createCommand('L') instanceof SpinLeft);
    }

    public function testSpinRightCreated()
    {
        $this->assertTrue((new CommandFactory)->createCommand('R') instanceof SpinRight);
    }

    public function testMoveCreated()
    {
        $this->assertTrue((new CommandFactory)->createCommand('M') instanceof Move);
    }

    public function testInvalidInput()
    {
        $this->expectException(InvalidArgumentException::class);
        (new CommandFactory)->createCommand('X');
    }
}
