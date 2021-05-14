<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Controller;

/**
 * @author Ezichi Ebere
 */
class UsersController extends Controller
{
  public function index()
  {
    return $this->render('users');
  }
}
