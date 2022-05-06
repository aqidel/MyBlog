<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller {

  public function main_action() {
    // Fix for non-existant query at first request
    $url_query = 'page=1';
    if (isset(parse_url($_SERVER['REQUEST_URI'])['query'])) {
      $url_query = parse_url($_SERVER['REQUEST_URI'])['query'];
    }
    $pagination = $this->model->pagination($url_query);
    $this->view->render($pagination);
  }

  public function delete_action() {
    $this->model->delete_post();
    header('Location: http://myblog.ru/');
  }
  
}