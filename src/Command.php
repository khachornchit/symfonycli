<?php
/**
 * Class/file Command.php
 *
 * @author John Pluto Solutions <john@pluto.solutions>
 * Date: 2/15/2019
 * Time: 8:45 AM
 */

namespace Console;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends SymfonyCommand
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function greetUser(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'PHP Symfony Console Application',
            '-------------------------------'
        ]);

        $output->writeln($this->getGreeting() . ', ' . $input->getArgument('username'));
    }

    protected function getGreeting()
    {
        $time = date("H");
        $timezone = date("e");
        if ($time < "12") {
            return "Good morning";
        } else
            if ($time >= "12" && $time < "17") {
                return "Good afternoon";
            } else
                if ($time >= "17" && $time < "19") {
                    return "Good evening";
                } else
                    if ($time >= "19") {
                        return "Good night";
                    }
    }
}
