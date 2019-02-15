<?php
/**
 * Class/file UserCreateCommand.php
 *
 * @author John Pluto Solutions <john@pluto.solutions>
 * Date: 2/15/2019
 * Time: 3:37 PM
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

class UserCreateCommand extends Command
{
    public function configure()
    {
        $this->setName('user-create')
            ->setDescription('Create a new user. See example follow Help.')
            ->setHelp('Example: php console.php user-create [username] [userpassword]')
            ->addArgument('username', InputArgument::REQUIRED, 'username parameters')
            ->addArgument('userpassword', InputArgument::REQUIRED, 'userpassword parameters');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $username = $input->getArgument('username');
            $password = $input->getArgument('userpassword');
            $passwordStrength = User::passwordStrengthCheck($password);

            if ($passwordStrength["password_strength"] == false) {
                $output->writeln($passwordStrength);
            } else {
                $user = User::create($username, $password);

                $userManager = new UserManager();
                $userManager->update($user);

                $output->writeln(sprintf('Created a new user successfully !'));
                $output->writeln(sprintf('id : %s', $user->getId()));
                $output->writeln(sprintf('username : %s', $user->getUsername()));
                $output->writeln(sprintf('password : %s', $user->getUserpassword()));
            }
        } catch (exception $e) {
            $output->writeln($e->getMessage());
        }
    }
}
