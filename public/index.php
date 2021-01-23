<?php

require_once '../vendor/autoload.php';

use App\Core\Application;

$app = new Application();
$app->router->get('/', function(){
  return '<h1>Index</h1>';
});
$app->router->get('/home', function(){
  return '<h1>Home</h1>';
});
$app->router->resolve();
