<?php

namespace App\Core;

/**
 * @author Ezichi Ebere
 */
class Router
{
  protected array $routes = [];
  protected Request $request;

  function __construct(Request $request)
  {
    $this->request = $request;
  }

  public function get($path, $callback)
  {
    $this->routes['get'][$path] = $callback;
  }

  public function resolve()
  {
    $path = $this->request->getPath();
    $method = $this->request->getMethod();
    echo "<pre>";
    var_dump($path);
    var_dump($method);
    echo "</pre>";
    exit;
  }
}
