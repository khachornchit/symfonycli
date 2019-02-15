<?php
/**
 * Class/file DbController.php
 *
 * @author John Pluto Solutions <john@pluto.solutions>
 * Date: 2/15/2019
 * Time: 3:19 PM
 */

namespace Console\Manager;

use Console\Entity\User;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class UserManager
{
    private $configuration;

    private $connection_parameters;

    private $entity_manager;

    /**
     * DbController constructor.
     */
    public function __construct()
    {
        $this->configuration = Setup::createAnnotationMetadataConfiguration(
            $paths = [__DIR__ . '/src/Entity'],
            $isDevMode = true
        );

        $this->connection_parameters = [
            'dbname' => 'pluto',
            'user' => 'root',
            'password' => '1234',
            'host' => 'localhost',
            'driver' => 'pdo_mysql'
        ];

        $this->entity_manager = EntityManager::create($this->connection_parameters, $this->configuration);
    }

    /**
     * @param User $user
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function update(User $user)
    {
        $this->entity_manager->persist($user);
        $this->entity_manager->flush();
    }

    /**
     * @param $id
     * @return User
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function find($id): User
    {
        return $this->entity_manager->find('Console\\Entity\\User', $id);
    }

    /**
     * @param $id
     * @return string
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function delete($id): string
    {
        $user = $this->find($id);
        if ($user) {
            $this->entity_manager->remove($user);
            $this->entity_manager->flush();
            return "Deleted used id : " . $id . " successfully !";
        } else {
            return "Find not found used id : " . $id . " please contact administrator !";
        }
    }
}
