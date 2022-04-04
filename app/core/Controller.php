<?php

namespace app\core;

class Controller {

  public $action;
  public $view;

  function __construct($action) {
    $this->action = $action;
  }
  
}