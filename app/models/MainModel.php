<?php

namespace app\models;

use app\core\Model;
use PDO;

class MainModel extends Model {

  public function pagination($url_query) {
    $pagination = [];
    $onpage = 3;
    // Get current page number from exploded url query
    $pagination['current_page'] = explode('=', $url_query)[1];
    // Get the total number of pages
    $pagination['pages'] = $this->calculate_pages($onpage);
    // Calculation of the first post's position
    $first_post = ($pagination['current_page'] * $onpage) - $onpage;
    // Get all posts for the current page
    $pagination['posts'] = $this->get_posts($first_post, $onpage);
    return $pagination;
  }

  public function get_posts($first_post, $onpage) {
    $stmt = $this->db->query("SELECT * FROM posts ORDER BY id ASC LIMIT $first_post, $onpage");
    $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = $this->date_conversion($stmt);
    return $stmt;
  }

  public function calculate_pages($onpage) {
    $stmt = $this->db->query("SELECT COUNT(id) FROM posts");
    $num_of_posts = $stmt->fetchColumn();
    $pages = ceil($num_of_posts / $onpage);
    return $pages;
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
    // Get id from url query
    $id = explode('=', $query)[1];
    $this->db->query("DELETE FROM posts WHERE id=$id");
  }
  
}