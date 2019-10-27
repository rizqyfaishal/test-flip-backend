<?php 

namespace App;

use SQLite3;

class Database extends SQLite3 {


  public static $instance = null;

  public function __construct($databaseConfig) {
    $this->open($databaseConfig['name']);
  }

  public function close() {
    $this->close();
  }

  public static function getInstance() {
    if(is_null(self::$instance)) {
      self::$instance = new Database();
    }

    return self::$instance;
  }
}
