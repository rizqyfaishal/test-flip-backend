<?php

$app = require_once getcwd() . '/bootstrap.php';
$app->startConsumeRequest($_SERVER, getallheaders(), $_POST);

