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
        $class = ucfirst($options['controller']) . 'Controller';
        $controller = new $class($options, $route);
        $controller->render();
        return;
      }
    }
    header('HTTP/1.1 404');
  }

}