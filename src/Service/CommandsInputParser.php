<?php

namespace MarsRover\Service;

use MarsRover\Collections\CommandCollection;

class CommandsInputParser
{
    private $commandCollection;
    
    public function get(): CommandCollection
    {
        return $this->commandCollection;
    }

    public function __construct(string $input)
    {
        $this->commandCollection = new CommandCollection;

        $commands = str_split(trim($input));

        foreach ($commands as $commandType) {
            $this->commandCollection->append((new CommandFactory)->createCommand($commandType));
        }
    }
}
