<?php

namespace app\core;

use app\core\View;

class Controller {

  public $action;
  public $controller;
  public $view;
  public $model;

  function __construct($action, $controller) {
    $this->action = $action;
    $this->controller = $controller;
    $this->view = new View($action);
    $this->model = $this->init_model($controller);
  }

  public function init_model($name) {
    $path = 'app\models\\' . ucfirst($name);
		if (class_exists($path)) {
			return new $path($name);
		}
  }
  
}