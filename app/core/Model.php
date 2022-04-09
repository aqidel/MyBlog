<?php

namespace app\core;

use PDO;
use PDOException;

class Model {

  protected $db;
  protected $config;

  public function __construct() {
    $this->config = require 'app/config/db.php';
    $this->connect();
  }

  public function create_db() {
    try {
      $db = new PDO('mysql:host=' . $this->config['host'], $this->config['user'], $this->config['password']);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "CREATE DATABASE myblogdb";
      $db->exec($sql);
      $this->db = $db;
      $this->connect();
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
    }
  }

  public function connect() {
    try {
      $db = new PDO('mysql:host=' . $this->config['host'] . ';dbname=' . $this->config['name'] . '', $this->config['user'], $this->config['password']);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->db = $db;
    } catch (PDOException $e) {
      $this->create_db();
    }
  }

}