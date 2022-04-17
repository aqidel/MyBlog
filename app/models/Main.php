<?php

namespace app\models;

use app\core\Model;
use PDO;

class Main extends Model {

  public function get_posts() {
    $stmt = $this->db->query('SELECT header, text FROM posts');
    $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $stmt;
  }
  
}