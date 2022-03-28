<?php

require 'controllers/MainController.php';

class Router {

  function __construct($url) {

    $routes = require 'config/routes.php';

    $url = trim($url, '/');

    foreach ($routes as $route => $options) {
      if ($url == $route) {
        $path = ucfirst($options['controller']) . 'Controller';
        $controller = new $path($options);
        return;
      }
    }
    header('HTTP/1.1 404');
  }

}