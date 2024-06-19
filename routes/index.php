<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\MenuController;
use Route\Router;

$router = new Router();

$router->get('/', HomeController::class, 'index');
$router->get('/kitchen', HomeController::class, 'kitchen');
$router->post('/auth/signin', AuthController::class, 'auth');
$router->get('/auth/signout', AuthController::class, 'logout');
$router->post('/menu', MenuController::class, 'store');
$router->post('/order', MenuController::class, 'addOrder');
$router->put('/order', MenuController::class, 'isReady');


$router->dispatch();
