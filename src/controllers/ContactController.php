<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Request;

/**
 * @author Ezichi Ebere
 */
class ContactController
{
  public function send(Request $request)
  {
    if ($request->isPost()) {
      echo "It is post!";
      die;
    }
    var_dump($request->getBody());
    die;
    return "We are in controller!";
  }
}
