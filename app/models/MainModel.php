<?php

namespace app\models;

use app\core\Model;
use PDO;

class MainModel extends Model {

  public function pagination($url_query) {
    $onpage = 3;
    // Gets first post's id from exploded url query
    $page_number = explode('=', $url_query)[1];
    // Calculation of the first post's position
    $first_post = ($page_number * $onpage) - $onpage;
    $page_posts = $this->get_posts($first_post, $onpage);
    return $page_posts;
  }

  public function get_posts($first_post, $onpage_posts) {
    $stmt = $this->db->query("SELECT * FROM posts ORDER BY id ASC LIMIT $first_post, $onpage_posts");
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

  public function delete_post($query) {
    // Gets id from url query
    $id = explode('=', $query)[1];
    $this->db->query("DELETE FROM posts WHERE id=$id");
  }
  
}