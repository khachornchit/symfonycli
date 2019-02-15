<?php
/**
 * Class/file UserDeleteCommand.php
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

class UserDeleteCommand extends Command
{
    public function configure()
    {
        $this->setName('user-delete')
            ->setDescription('Delete a user from id. See example follow Help.')
            ->setHelp('Example: php console.php user-delete [id]')
            ->addArgument('id', InputArgument::REQUIRED, 'id parameters');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $id = $input->getArgument('id');
            $userManager = new UserManager();
            $output->writeln(sprintf($userManager->delete($id)));
        } catch (exception $e) {
            $output->writeln(sprintf($e->getMessage()));
        }
    }
}
