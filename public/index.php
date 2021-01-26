<?php

require_once '../vendor/autoload.php';

use App\Core\Application;
use App\Controllers\ContactController;

$app = new Application(dirname(__DIR__));
$app->router->get('/', 'home');
$app->router->get('/users', 'users');
$app->router->get('/contact', 'contact');
$app->router->post('/contact', [ContactController::class, 'send']);
$app->run();
