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
    $callback = $this->routes[$method][$path] ?? false;

    if ($callback === false) {
      return "404 - Not found!";
    }

    if (is_string($callback)) {
      return $this->renderView($callback);
    }

    return call_user_func($callback);
  }

  public function renderView($view)
  {
    include_once Application::$ROOT_DIR."/views/$view.php";
  }
}
