<?php
/**
 * Class/file cli-config.php
 *
 * @author John Pluto Solutions <john@pluto.solutions>
 * Date: 2/15/2019
 * Time: 9:46 AM
 */

use Doctrine\ORM\Tools\Console\ConsoleRunner;

//require_once 'bootstrap.php';
// Setup Doctrine
$configuration = Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
    $paths = [__DIR__ . '/src/Entity'],
    $isDevMode = true
);

// Setup connection parameters
$connection_parameters = [
    'dbname' => 'pluto',
    'user' => 'root',
    'password' => '1234',
    'host' => 'localhost',
    'driver' => 'pdo_mysql'
];

// Get the entity manager
$entity_manager = Doctrine\ORM\EntityManager::create($connection_parameters, $configuration);

return ConsoleRunner::createHelperSet($entity_manager);
