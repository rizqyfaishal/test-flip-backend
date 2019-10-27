<?php

use App\Router;
use App\Controllers\UserController;
use App\Controllers\DisburseController;

$router = new Router();

$router->get('/\/users$/', UserController::class, 'index');
$router->get('/\/disbursements$/', DisburseController::class, 'index');
$router->post('/\/disbursements$/', DisburseController::class, 'store');
$router->get('/\/disbursements\/([0-9]+)$/', DisburseController::class, 'detail');
$router->patch('/\/disbursements\/([0-9]+)$/', DisburseController::class, 'update');


return $router;
