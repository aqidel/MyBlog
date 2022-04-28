<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller {

  public function main_action() {
    $data = $this->model->get_posts();
    $this->view->render($data);
  }

  public function delete_action() {
    $id = parse_url($_SERVER['REQUEST_URI'])['query'];
    $this->model->delete_post($id);
  }
  
}