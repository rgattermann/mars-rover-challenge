<?php

namespace MarsRover\Collections;

use \ArrayObject;

class RoverCollection extends ArrayObject
{
    public function executeAll(): void
    {
        $i = $this->getIterator();
        $i->rewind();

        while ($i->valid()) {
            $i->current()->execute();
            $i->next();
        }
    }

    public function printAllSetup(): string
    {
        $i = $this->getIterator();
        $i->rewind();

        $setup = [];
        while ($i->valid()) {
            array_push($setup, $i->current()->printSetup());
            $i->next();
        }

        return implode(PHP_EOL, $setup);
    }
}
