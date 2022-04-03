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
    switch ($class) {
      case 'MainController':
        $controller = new MainController($options, $route);
        $controller->render();
        break;
      case 'AdminController':
        $controller = new AdminController($options, $route);
        if (!$controller->is_logged()) {
          header('Location: http://myblog.ru/admin/login');
        } else {
          $controller->render();
        }
        break;
      default:
        echo '404';
    }
  }

}