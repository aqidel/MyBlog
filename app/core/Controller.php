<?php

namespace app\core;

use app\core\View;

class Controller {

  public $action;
  public $view;

  function __construct($action) {
    $this->action = $action;
    $this->view = new View($action);
  }
  
}