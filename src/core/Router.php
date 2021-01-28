<?php

namespace App\Core;

/**
 * @author Ezichi Ebere
 */
class Router
{
  protected array $routes = [];
  protected Request $request;
  protected Response $response;
  protected string $layout = 'main';

  function __construct(Request $request, Response $response)
  {
    $this->request = $request;
    $this->response = $response;
  }

  public function get($path, $callback)
  {
    $this->routes['get'][$path] = $callback;
  }

  public function post($path, $callback)
  {
    $this->routes['post'][$path] = $callback;
  }

  public function resolve()
  {
    $path = $this->request->getPath();
    $method = $this->request->method();
    $callback = $this->routes[$method][$path] ?? false;

    if ($callback === false) {
      $this->response->setStatusCode(404);

      return "404 - Not found!";
    }

    if (is_string($callback)) {
      return $this->renderView($callback);
    }

    if (is_array($callback)) {
      Application::$app->controller = new $callback[0];
      $callback[0] = Application::$app->controller;
    }

    return call_user_func($callback, $this->request);
  }

  public function renderView($view, $params = [])
  {
    $layoutContent = $this->layoutContent();
    $viewContent = $this->renderOnlyView($view, $params);

    return str_replace("{{ content }}", $viewContent, $layoutContent);
  }

  protected function layoutContent()
  {
    $layout = Application::$app->controller->layout;
    ob_start();
    include_once Application::$ROOT_DIR."/views/layout/$layout.php";

    return ob_get_clean();
  }

  protected function renderOnlyView($view, $params)
  {
    foreach ($params as $key => $value) {
      $$key = $value;
    }
    ob_start();
    include_once Application::$ROOT_DIR."/views/$view.php";

    return ob_get_clean();
  }
}
