<?php
/**
 * Class/file TimeCommand.php
 *
 * @author John Pluto Solutions <john@pluto.solutions>
 * Date: 2/15/2019
 * Time: 8:45 AM
 */

namespace Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\Command;

class HelloCommand extends Command
{
    public function configure()
    {
        $this->setName('hello')
            ->setDescription('Hello command !')
            ->setHelp('Hello command for testing')
            ->addArgument('username', InputArgument::REQUIRED, 'username parameters');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->greetUser($input, $output);
    }
}
