<?php

namespace app\core;

class Router {

  public $routes;
  public $url;

  function __construct() {
    $this->routes = require 'app/config/routes.php';
    $this->url = parse_url($_SERVER['REQUEST_URI'])['path'];
    $this->match_url();
  }

  public function match_url() {
    foreach ($this->routes as $route => $options) {
      if ($this->url == $route) {
        $this->controller_call($options);
        return;
      }
    }
    header('HTTP/1.1 404');
  }

  public function controller_call($options) {
    $class = 'app\controllers\\' . ucfirst($options['controller']) . 'Controller';
    if (class_exists($class)) {
      $action = $options['action'] . '_action';
      if (method_exists($class, $action)) {
        $controller = new $class($options['action'], $options['controller']);
        $controller->$action();
      } else {
        echo 'Such action does not exist!';
      }
    } else {
      echo 'Such controller does not exist!';
    }
  }

}