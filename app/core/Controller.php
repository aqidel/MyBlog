<?php

namespace app\core;

use app\core\View;

class Controller {

  public $action;
  public $controller;
  public $view;
  public $modals;
  public $model;

  function __construct($action, $controller) {
    $this->action = $action;
    $this->controller = $controller;
    $this->view = new View($action);
    $this->modals = new Modals();
    $this->model = $this->init_model($controller);
  }

  public function init_model($name) {
    $path = 'app\models\\' . ucfirst($name) . 'Model';
		return new $path($name);
  }
  
}