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

use Symfony\Component\Console\Application;
use Console\HelloCommand;
use Console\ClearCacheCommand;
use Console\UserCreateCommand;
use Console\UserReadCommand;
use Console\UserUpdateCommand;
use Console\UserDeleteCommand;

$app = new Application('Console App', 'v1.0.0');
$app->add(new HelloCommand());
$app->add(new ClearCacheCommand());
$app->add(new UserCreateCommand());
$app->add(new UserReadCommand());
$app->add(new UserUpdateCommand());
$app->add(new UserDeleteCommand());

$app->run();
