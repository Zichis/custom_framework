<?php

require_once '../vendor/autoload.php';

use App\Core\Application;

$app = new Application(dirname(__DIR__));
$app->router->get('/', 'home');
$app->router->get('/users', 'users');
$app->router->get('/contact', 'contact');
$app->router->post('/contact', function(){
  return "Handling submitted data";
});
$app->run();
