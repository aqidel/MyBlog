<?php

class AdminController extends Controller {

  public function is_logged() {
    if ($this->route == 'admin') {
      return false;
    } else {
      return true;
    }
  }

}