<?php

namespace app\core;

class Router {

  public $routes;

  function __construct() {
    $this->routes = require 'app/config/routes.php';
    $url = parse_url($_SERVER['REQUEST_URI'])['path'];
    $url = trim($url, '/');
    $this->match_url($url);
  }

  public function match_url($url) {
    foreach ($this->routes as $route => $options) {
      if ($url == $route) {
        $this->controller_call($options);
        return;
      }
    }
    header('HTTP/1.1 404 Not Found');
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