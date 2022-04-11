<?php

namespace app\models;

use app\core\Model;
use PDO;

class Admin extends Model {

  public function insert($post) {
    $params = [
      'id' => '',
      'header' => $post['header'],
      'text' => $post['text'],
    ];
    $stmt = $this->db->prepare('INSERT INTO posts VALUES (:id, :header, :text)');
    if (!empty($params)) {
      $stmt->bindValue('id', $params['id'], PDO::PARAM_INT);
      $stmt->bindValue('header', $params['header'], PDO::PARAM_STR);
      $stmt->bindValue('text', $params['text'], PDO::PARAM_STR);
    }
    $stmt->execute();
  }

}