<?php

namespace MarsRover\Collections;

use \ArrayObject;
use MarsRover\Service\Log;

class RoverCollection extends ArrayObject
{
    public function executeAll(): void
    {
        $i = $this->getIterator();
        $i->rewind();

        while ($i->valid()) {
            $rover = $i->current();
            Log::debug('Excuting rover: ', [$rover->printSetup()]);
            $rover->execute();
            $i->next();
        }
    }

    public function printAllSetup(): string
    {
        $i = $this->getIterator();
        $i->rewind();

        $setup = [];
        while ($i->valid()) {
            $rover = $i->current();
            array_push($setup, $rover->printSetup());
            $i->next();
        }

        return implode(PHP_EOL, $setup);
    }
}
