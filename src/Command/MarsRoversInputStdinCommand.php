<?php
namespace MarsRover\Command;

use MarsRover\Service\Input;
use MarsRover\Model\{Plateau, Rover, RoverSetup};
use MarsRover\Collections\RoverCollection;
use MarsRover\Service\CommandsInputParser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\{Question, ConfirmationQuestion};

class MarsRoversInputStdinCommand extends Command
{
    protected function configure()
    {
        $this->setName('marsrovers:input');
        $this->setDescription('Input rover instructions');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');
        $plateau_dimensions = $helper->ask($input, $output, (new Question('Plateau dimensions: ', 3)));

        list($plateau_x, $plateau_y) = explode(Input::CMD_SEPARATOR, $plateau_dimensions);
        $plateau = new Plateau((int)$plateau_x, (int)$plateau_y);

        $roverCollection = new RoverCollection;
        $squadCounter = 0;
        $add_new_rover = true;
        
        while ($add_new_rover === true) {
            $command = $helper->ask($input, $output, (new Question('Rover position: ')));

            if ($roverCollection->offsetExists($squadCounter) == false) {
                $rover = new Rover($plateau);
                $rover->setSetup(new RoverSetup($command));
                $roverCollection->offsetSet($squadCounter, $rover);
            }

            $command = $helper->ask($input, $output, (new Question('Rover commands: ')));

            if ($roverCollection->offsetExists($squadCounter)) {
                $rover = $roverCollection->offsetGet($squadCounter);
                $rover->setCommands((new CommandsInputParser($command))->get());
                $squadCounter++;
            }

            $question = new ConfirmationQuestion(
                'Add other rover?',
                false,
                '/^(y|j)/i'
            );
            $add_new_rover = $helper->ask($input, $output, $question);
        }

        $roverCollection->executeAll();
        $output->writeln('Commands result:');
        $output->writeln($roverCollection->printAllSetup());
    }
}