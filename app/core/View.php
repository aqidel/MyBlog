<?php

namespace app\core;

class View {

  public $view;

  function __construct($action) {
    $this->view = $action;
  }

  public function render($data = null) {
    require 'app/views/' . $this->view . '.php';
  }

}