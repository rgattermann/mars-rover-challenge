<?php

namespace MarsRover\Interfaces;

use MarsRover\Model\Rover;

interface Command
{
    public function execute(Rover $Rover): void;
}
