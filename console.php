<?php
/**
 * Class/file console.php
 *
 * @author John Pluto Solutions <john@pluto.solutions>
 * Date: 2/15/2019
 * Time: 8:40 AM
 */

/** console.php **/
#!/usr/bin/env php

require_once __DIR__ . '/vendor/autoload.php';

// Setup Doctrine
$configuration = Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
    $paths = [__DIR__ . '/entities'],
    $isDevMode = true
);

// Setup connection parameters
$connection_parameters = [
    'dbname' => 'pluto',
    'user' => 'root',
    'password' => '1234',
    'host' => 'mysql',
    'driver' => 'pdo_mysql'
];

// Get the entity manager
$entity_manager = Doctrine\ORM\EntityManager::create($connection_parameters, $configuration);

use Symfony\Component\Console\Application;
use Console\HelloCommand;

$app = new Application('Console App', 'v1.0.0');
$app->add(new HelloCommand());
$app->run();
