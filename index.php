<?php

require_once __DIR__.'/vendor/autoload.php';

use App\Core\Application;;

echo "Hello!";

$app = new Application();
$app->router->resolve();
