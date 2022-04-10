<?php

namespace app\core;

use PDO;

class Model {

  protected $db;

  public function __construct() {
    $config = require 'app/config/db.php';
    $this->db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['name'] . '', $config['user'], $config['password']);
  }

  public function query($sql, $params=[]) {
    $stmt = $this->db->prepare($sql);
    if (!empty($params)) {
      foreach ($params as $key => $val) {
        if (is_int($val)) {
					$type = PDO::PARAM_INT;
				} else {
					$type = PDO::PARAM_STR;
				}
				$stmt->bindValue($key, $val, $type);
      }
    }
  }

}