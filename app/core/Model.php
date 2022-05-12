<?php

namespace app\core;

use PDO;

class Model {

  protected $db;

  public function __construct() {
    $this->connect();
  }

  public function connect() {
    $config = require 'app/config/db.php';
    $this->db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['name'] . '', $config['user'], $config['password']);
  }

}