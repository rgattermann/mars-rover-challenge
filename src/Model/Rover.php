<?php

namespace MarsRover\Model;

use MarsRover\Collections\CommandCollection;
use MarsRover\Service\Log;
use MarsRover\Model\Plateau;
use MarsRover\Exceptions\OutOfPlateauRange;

class Rover
{
    private $setup;
    private $commands;
    private $plateau;

    public function __construct(Plateau $plateau)
    {
        $this->plateau = $plateau;
    }

    public function setCommands(CommandCollection $c)
    {
        $this->commands = $c;
        return $this;
    }

    public function setSetup(RoverSetup $rs)
    {
        if (!$this->insaidePlateau($this->plateau, $rs)) {
            throw new OutOfPlateauRange('Coordenate ' . $rs->printInstructions() . ' out of plateau');
        }

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
            Log::debug('Excuting command: ', [get_class($command)]);
            $command->execute($this);
            Log::debug('Current setup: ', [$this->setup->printInstructions()]);
            $iterator->next();
        }
    }

    public function printSetup(): string
    {
        return $this->setup->printInstructions();
    }

    private function insaidePlateau(Plateau $plateau, RoverSetup $roverSetup) : bool
    {
        $coordinate = $roverSetup->getCoordinate();

        return $coordinate->getX() >= 0
            && $coordinate->getX() <= $plateau->getCoordinate()->getX()
            && $coordinate->getY() >= 0
            && $coordinate->getY() <= $plateau->getCoordinate()->getY();
    }
}
