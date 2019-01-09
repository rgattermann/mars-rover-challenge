<?php

namespace MarsRover\Test\Service;

use MarsRover\Collections\CommandCollection;
use MarsRover\Service\CommandsInputParser;
use PHPUnit\Framework\TestCase;

class CommandsInputParserTest extends TestCase
{
    public function testParseInputCommandCollection()
    {
        $this->assertTrue((new CommandsInputParser('MRMLMM'))->get() instanceof CommandCollection);
    }
}
