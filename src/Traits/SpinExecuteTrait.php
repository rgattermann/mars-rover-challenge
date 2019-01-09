<?php

namespace MarsRover\Traits;

use MarsRover\Model\{Rover, RoverSetup};
use MarsRover\Service\Input;

trait SpinExecuteTrait
{
    public function execute(Rover $rover) : void
    {
        $setup = $rover->getSetup();
        $coordinate = $setup->getCoordinate();
        $orientation = $setup->getDirection()->getOrientation();

        $newSetup = $coordinate->getX() . Input::CMD_SEPARATOR . 
            $coordinate->getY() . Input::CMD_SEPARATOR . 
            $this->spin($orientation);
        $rover->setSetup(new RoverSetup($newSetup));
    }
}