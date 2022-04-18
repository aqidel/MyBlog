<?php

namespace app\models;

use app\core\Model;
use PDO;

class Main extends Model {

  public function get_posts() {
    $stmt = $this->db->query('SELECT header, text, date FROM posts');
    $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = $this->date_conversion($stmt);
    return $stmt;
  }

  public function date_conversion($stmt) {
    $months = [
      '01' => 'Jan',
      '02' => 'Feb',
      '03' => 'Mar',
      '04' => 'Apr',
      '05' => 'May',
      '06' => 'June',
      '07' => 'July',
      '08' => 'Aug',
      '09' => 'Sep',
      '10' => 'Oct',
      '11' => 'Nov',
      '12' => 'Dec'
    ];
    foreach ($stmt as $key => $value) {
      $date = $value['date'];
      $date = explode('-', $date);
      $date[1] = $months[$date[1]];
      $date = $date[1] . ' ' . $date[2] . ', ' . $date[0];
      $stmt[$key]['date'] = $date;
    }
    return $stmt;
  }
  
}