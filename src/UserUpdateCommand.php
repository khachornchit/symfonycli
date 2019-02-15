<?php
/**
 * Class/file UserUpdateCommand.php
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

class UserUpdateCommand extends Command
{
    public function configure()
    {
        $this->setName('user-update')
            ->setDescription('Update user. See example follow Help.')
            ->setHelp('Example: php console.php user-update [id] [username] [userpassword]')
            ->addArgument('id', InputArgument::REQUIRED, 'id parameters')
            ->addArgument('username', InputArgument::REQUIRED, 'username parameters')
            ->addArgument('userpassword', InputArgument::REQUIRED, 'userpassword parameters');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $id = $input->getArgument('id');
            $username = $input->getArgument('username');
            $password = $input->getArgument('userpassword');
            $passwordStrength = User::passwordStrengthCheck($password);

            if ($passwordStrength["password_strength"] == false) {
                $output->writeln($passwordStrength);
            } else {
                $userManager = new UserManager();
                $existingUser = $userManager->find($id);

                if ($existingUser) {
                    $user = User::update($username, $password, $existingUser);
                    $userManager->update($user);

                    $output->writeln(sprintf('Updated user successfully !'));
                    $output->writeln(sprintf('id : %s', $user->getId()));
                    $output->writeln(sprintf('username : %s', $user->getUsername()));
                    $output->writeln(sprintf('password : %s', $user->getUserpassword()));
                } else {
                    $output->writeln(sprintf('Find not found this user id, please contact administrator !'));
                }
            }
        } catch (exception $e) {
            $output->writeln($e->getMessage());
        }
    }
}
