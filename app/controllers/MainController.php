<?php

namespace app\controllers;

use app\core\Controller;
use app\core\View;

class MainController extends Controller {

  public function posts_action() {
    $view = new View($this->action);
    $view->render();
  }
  
}