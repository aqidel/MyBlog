<?php

class Controller {

  public $controller;
  public $action;
  public $route;

  function __construct($options, $route) {
    $this->controller = $options['controller'];
    $this->action = $options['action'];
    $this->route = $route;
  }

  public function render() {
    require 'app/views/' . $this->action . '.php';
  }
  
}