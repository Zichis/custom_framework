<?php

namespace App\Core;

class Application
{
  public static Application $app;
  public static string $ROOT_DIR;
  public Router $router;
  public Request $request;
  public Response $response;
  public Controller $controller;

  public function __construct(string $rootPath)
  {
    self::$app = $this;
    self::$ROOT_DIR = $rootPath;
    $this->request = new Request();
    $this->response = new Response();
    $this->router = new Router($this->request, $this->response);
  }

  public function run()
  {
    echo $this->router->resolve();
  }

  /**
   * Get the value of Controller
   *
   * @return Controller
   */
  public function getController()
  {
    return $this->controller;
  }

  /**
   * Set the value of Controller
   *
   * @param Controller $controller
   */
  public function setController(Controller $controller): void
  {
    $this->controller = $controller;
  }
}
