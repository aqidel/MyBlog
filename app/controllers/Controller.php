<?php

class Controller {

  public $controller;
  public $view;
  public $route;

  function __construct($options, $route) {
    $this->controller = $options['controller'];
    $this->view = $options['view'];
    $this->route = $route;
  }

  public function render() {
    require 'app/views/' . $this->view . '.php';
  }
  
}