<?php

class Router {

  public $routes;
  public $url;

  function __construct($url) {
    $this->routes = require 'config/routes.php';
    $this->url = trim($url, '/');
    $this->match_url();
  }

  public function match_url() {
    foreach ($this->routes as $route => $options) {
      if ($this->url == $route) {
        $this->controller_call($options, $route);
        return;
      }
    }
    header('HTTP/1.1 404');
  }

  public function controller_call($options, $route) {
    $class = ucfirst($options['controller']) . 'Controller';
    $action = $options['action'] . '_action';
    $controller = new $class($options, $route);
    $controller->$action();
  }

}