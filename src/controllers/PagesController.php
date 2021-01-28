<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Controller;

/**
 * @author Ezichi Ebere
 */
class PagesController extends Controller
{
  public function index()
  {
    $data = array(
      'name' => "Alili"
    );

    return $this->render('home', $data);
  }
}
