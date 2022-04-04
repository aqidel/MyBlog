<?php

namespace app\controllers;

use app\core\Controller;

class AdminController extends Controller {

  public function login_action() {
    $admin = require 'app/config/admin.php';
    $this->view->render();
    if ($_POST == $admin) {
      $_SESSION['admin'] = true;
      header('Location: http://myblog.ru/admin');
    } else {
      echo 'Wrong data!';
      //header('Location: http://myblog.ru/admin/login');
    }
  }

  public function logout_action() {
    //
  }

  public function create_action() {
    if (!$_SESSION['admin']) {
      header('Location: http://myblog.ru/admin/login');
    } else {
      $this->view->render();
    }
  }

  public function delete_action() {
    //
  }

}