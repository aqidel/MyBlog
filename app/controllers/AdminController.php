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
        $_SESSION['error_text'] = 'Wrong data!';
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
    $is_img_valid = $this->validate_image();
    if ($is_img_valid === true) {
      $this->model->insert($_POST);
      $this->image_upload();
      header('Location: http://myblog.ru/admin');
    } else {
      $_SESSION['error_text'] = $is_img_valid[1];
      header('Location: http://myblog.ru/admin');
    }
  }

  public function validate_image() {
    $MAX_SIZE = 2 * 1024 * 1024;
    $ALLOWED_TYPES = ['image/png', 'image/jpeg'];
    // Does image exists?
    if (!isset($_FILES['uploadFile'])) {
      return [false, 'Upload the image'];
    }
    // Check for file's size
    if (!filesize($_FILES['uploadFile']['tmp_name']) > $MAX_SIZE) {
      return [false, 'File size exceeds 2MB limit'];
    }
    // MIME-type check out
    if (!in_array(mime_content_type($_FILES['uploadFile']['tmp_name']), $ALLOWED_TYPES)) {
      return [false, 'MIME type is wrong'];
    }
    return true;
  }

  public function image_upload() {        
    $id = $this->model->last_id();
    $_FILES['uploadFile']['name'] = $id . '.jpg';
    $image = 'static/img/' . basename($_FILES['uploadFile']['name']);
    move_uploaded_file($_FILES['uploadFile']['tmp_name'], $image);
  }

}