<?php
declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use \MarsRover\Model\{Coordinate, Plateau, RoverSetup, Rover};
use \MarsRover\Collections\RoverCollection;
use \MarsRover\Service\{CommandsInputParser, Input};

if (STDIN) {
    list($plateau_x, $plateau_y) = explode(Input::CMD_SEPARATOR, fgets(STDIN));
    $coordinate = new Coordinate((int) $plateau_x, (int) $plateau_y);
    $plateau = new Plateau($coordinate);

    $roverCollection = new RoverCollection;
    $squadCounter = 0;

    while (trim($input = fgets(STDIN)) !== '') {
        $input = str_replace(array("\n", "\r"), ' ', $input);

        if (Input::isDigit(Input::toArray($input))) {
            if ($roverCollection->offsetExists($squadCounter) == false) {
                $rover = new Rover;
                $rover->setSetup(new RoverSetup($input));
                $roverCollection->offsetSet($squadCounter, $rover);
            }
        } else {
            if ($roverCollection->offsetExists($squadCounter)) {
                $rover = $roverCollection->offsetGet($squadCounter);
                $rover->setCommands((new CommandsInputParser($input))->get());
            }
        }
    }

    $roverCollection->executeAll();
    echo $roverCollection->printAllSetup();
 }
