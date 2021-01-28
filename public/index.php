<?php

require_once '../vendor/autoload.php';

use App\Core\Application;
use App\Controllers\ContactController;
use App\Controllers\PagesController;

$app = new Application(dirname(__DIR__));
$app->router->get('/', [PagesController::class, 'index']);
$app->router->get('/users', 'users');
$app->router->get('/contact', [ContactController::class, 'index']);
$app->router->post('/contact', [ContactController::class, 'index']);
$app->run();
