<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller {

  public function posts_action() {
    $this->view->render();
  }
  
}