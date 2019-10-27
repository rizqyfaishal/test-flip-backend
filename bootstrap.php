<?php
require_once getcwd() . '/vendor/autoload.php';

use App\Application;
$app = Application::getInstance();


return $app;
