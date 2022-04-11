<?php

namespace app\controllers;

use app\core\Controller;

class AdminController extends Controller {

  public function login_action() {
    $admin = require 'app/config/admin.php';
    $this->view->render();
    if (!empty($_POST)) {
      if ($_POST == $admin) {
        $_SESSION['admin'] = true;
        header('Location: http://myblog.ru/admin');
      } else {
        header('Location: http://myblog.ru/admin/login');
      }
    } else {
      return;
    }
  }

  public function logout_action() {
    unset($_SESSION['admin']);
    header('Location: http://myblog.ru/admin/login');
  }

  public function create_action() {
    if (!$_SESSION['admin']) {
      header('Location: http://myblog.ru/admin/login');
    } else {
      $this->view->render();
    }
  }

  public function posts_action() {
    //
  }

  public function add_action() {
    $this->model->insert($_POST);
    header('Location: http://myblog.ru/admin');
  }

  public function delete_action() {
    //
  }

}