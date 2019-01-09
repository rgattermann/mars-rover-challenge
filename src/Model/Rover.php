<?php

namespace MarsRover\Model;

use MarsRover\Collections\CommandCollection;

class Rover
{
    private $setup;
    private $commands;

    public function setCommands(CommandCollection $c)
    {
        $this->commands = $c;
        return $this;
    }

    public function setSetup(RoverSetup $rs)
    {
        $this->setup = $rs;
        return $this;
    }

    public function getSetup(): RoverSetup
    {
        return $this->setup;
    }

    public function execute(): void
    {
        $iterator = $this->commands->getIterator();
        $iterator->rewind();

        while ($iterator->valid()) {
            $command = $iterator->current();
            $command->execute($this);
            $iterator->next();
        }
    }

    public function printSetup(): string
    {
        return $this->setup->printInstructions();
    }
}
