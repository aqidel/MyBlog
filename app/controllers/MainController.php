<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller {

  public function main_action() {
    // Check for default page's non-existant query
    if (!isset(parse_url($_SERVER['REQUEST_URI'])['query'])) {
      header('Location: http://myblog.ru/?page=1');
    } else {
      $url_query = parse_url($_SERVER['REQUEST_URI'])['query'];
      $pagination = $this->model->pagination($url_query);
      $this->view->render($pagination);
    }
  }

  public function delete_action() {
    $query = parse_url($_SERVER['REQUEST_URI'])['query'];
    $this->model->delete_post($query);
    header('Location: http://myblog.ru/');
  }
  
}