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

  public function add_action() {
    // 1. validate image
    // 2. create post
    // 3. upload image
    $this->model->insert($_POST);
    $this->image_upload();
    header('Location: http://myblog.ru/admin');
  }

  public function image_upload() {
    $MAX_SIZE = 2 * 1024 * 1024;
    //$ALLOWED_TYPES = ['image/png', 'image/jpeg'];
    $ALLOWED_TYPES = ['some text'];
    // Does file exist?
    if (isset($_FILES['uploadFile'])) {
      // Check for file's size
      if (filesize($_FILES['uploadFile']['tmp_name']) < $MAX_SIZE) {
        // MIME-type check out
        if (in_array(mime_content_type($_FILES['uploadFile']['tmp_name']), $ALLOWED_TYPES)) {
          $id = $this->model->last_id();
          $_FILES['uploadFile']['name'] = $id . '.jpg';
          $image = 'static/img/' . basename($_FILES['uploadFile']['name']);
          move_uploaded_file($_FILES['uploadFile']['tmp_name'], $image);
        } else {
          //
        }
      } else {
        //
      }
    } else {
      //
    }
  }

}