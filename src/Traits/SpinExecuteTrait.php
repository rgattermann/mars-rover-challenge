<?php

namespace MarsRover\Traits;

use MarsRover\Model\{Rover, RoverSetup};

trait SpinExecuteTrait
{
    public function execute(Rover $rover) : void
    {
        $setup = $rover->getSetup();
        $coordinate = $setup->getCoordinate();
        $orientation = $setup->getDirection()->getOrientation();

        $newSetup = $coordinate->getX() . ' ' . $coordinate->getY() . ' ' . $this->spin($orientation);
        $rover->setSetup(new RoverSetup($newSetup));
    }
}