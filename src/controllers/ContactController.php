<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;

/**
 * @author Ezichi Ebere
 */
class ContactController extends Controller
{
  public function index(Request $request)
  {
    if ($request->isPost()) {
      echo "It is post!";
      die;
    }

    return $this->render('contact');
  }
}
