<?php

namespace App\Controllers;

use App\Core\Application;

/**
 * @author Ezichi Ebere
 */
class PagesController
{
  public function index()
  {
    $data = array(
      'name' => "Alili"
    );

    return Application::$app->router->renderView('home', $data);
  }
}
