<?php
namespace MarsRover\Command;

use SplFileObject;
use InvalidArgumentException;
use MarsRover\Service\Input;
use MarsRover\Model\{Coordinate, Plateau, Rover, RoverSetup};
use MarsRover\Collections\RoverCollection;
use MarsRover\Service\CommandsInputParser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\{Question, ConfirmationQuestion};
use MarsRover\Service\Log;

class MarsRoversInputFileCommand extends Command
{
    protected function configure()
    {
        $this->setName('marsrovers:import');
        $this->setDescription('import rover instructions');
        $this->addArgument('file', null, 'File instructions');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filename = $input->getArgument('file');

        if ($this->validateFile($filename)) {
            $file = new SplFileObject($filename, 'r');

            foreach ($file as $k => $line) {
                $line = str_replace(array("\n", "\r"), Input::CMD_SEPARATOR, $line);
                
                if ($file->key() == 0) {
                    
                    list($plateau_x, $plateau_y) = explode(Input::CMD_SEPARATOR, $line);
                    $coordinate = new Coordinate((int)$plateau_x, (int)$plateau_y);
                    $plateau = new Plateau($coordinate);

                    $roverCollection = new RoverCollection;
                    $squadCounter = 0;
                    continue;
                }

                if (Input::isDigit(Input::toArray($line))) {
                    if ($roverCollection->offsetExists($squadCounter) == false) {
                        $rover = new Rover($plateau);
                        $rover->setSetup(new RoverSetup($line));
                        $roverCollection->offsetSet($squadCounter, $rover);
                    }
                } else {
                    if ($roverCollection->offsetExists($squadCounter)) {
                        $rover = $roverCollection->offsetGet($squadCounter);
                        $rover->setCommands((new CommandsInputParser($line))->get());
                        $squadCounter++;
                    }
                }
            }

            $roverCollection->executeAll();
            $output->writeln('Commands result:');
            $output->writeln($roverCollection->printAllSetup());
        }
    }

    private function validateFile(string $filename): bool
    {
        if (empty($filename)) {
            throw new InvalidArgumentException('File ' . $filename . ' is empty!');
        }

        if (!file_exists($filename)) {
            throw new InvalidArgumentException('File not found: ' . $filename);
        }

        if (!is_readable($filename)) {
            throw new InvalidArgumentException('File is not readable: ' . $filename);
        }

        return true;
    }
}