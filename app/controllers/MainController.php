<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller {

  public function main_action() {
    $data = $this->model->get_posts();
    $this->view->render($data);
  }

  public function delete_action() {
    $query = parse_url($_SERVER['REQUEST_URI'])['query'];
    $this->model->delete_post($query);
    header('Location: http://myblog.ru/');
  }
  
}