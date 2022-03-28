<?php

class Controller {

  public $controller;
  public $action;

  function __construct($options) {
    $this->controller = $options['controller'];
    $this->action = $options['action'];
  }

  public function render() {
    require 'app/views/layouts/' . $this->controller . '.php';
  }
  
}