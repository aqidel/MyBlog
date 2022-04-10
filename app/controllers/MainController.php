<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller {

  public function __construct($route) {
    //
  }

  public function main_action() {
    $this->view->render();
  }
  
}