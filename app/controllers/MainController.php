<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller {

  public function main_action() {
    $data = $this->model->get_posts();
    $this->view->render($data);
  }
  
}