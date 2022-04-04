<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/static/css/main.css">
  <title>My Blog</title>
</head>
<body>
  <main>
    <?php

    spl_autoload_register(function($class) {
      $path = str_replace('\\', '/', $class . '.php');
      if (file_exists($path)) {
          require $path;
      }
    });

    use app\core\Router;

    $router = new Router($_SERVER['REQUEST_URI']);

    ?>
  </main>
</body>
</html>