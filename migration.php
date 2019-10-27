<?php

require_once getcwd() . '/vendor/autoload.php';

use App\Application;
use App\DatabaseMigration;

$app = Application::getInstance();

$databaseMigration = new DatabaseMigration($app->database);

$databaseMigration->createMigrationTable();
$databaseMigration->migrate();

