<?php
/**
 * Class/file UserReadCommand.php
 *
 * @author John Pluto Solutions <john@pluto.solutions>
 * Date: 2/15/2019
 * Time: 3:38 PM
 */

namespace Console;

use Console\Entity\User;
use Console\Command;
use Console\Manager\UserManager;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class UserReadCommand extends Command
{
    public function configure()
    {
        $this->setName('user-read')
            ->setDescription('Read user info from id. See example follow Help.')
            ->setHelp('Example: php console.php user-read [id]')
            ->addArgument('id', InputArgument::REQUIRED, 'id parameters');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $id = $input->getArgument('id');
            $userManager = new UserManager();
            $user = $userManager->find($id);

            if ($user) {
                $output->writeln(sprintf('Read user info successfully !'));
                $output->writeln(sprintf('id : %s', $user->getId()));
                $output->writeln(sprintf('username : %s', $user->getUsername()));
                $output->writeln(sprintf('password : %s', $user->getUserpassword()));
            } else {
                $output->writeln(sprintf('Find not found this user id, please contact administrator !'));
            }
        } catch (exception $e) {
        }
    }
}
