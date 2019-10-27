<?php 

namespace App\Models;

use App\Application;


class Model {

  protected $tableName = '';


  protected $fillable = [];
  protected $visible = [];

  private $isSaved = false;
  private $isUpdated = false;

  private $data = [];

  public function __construct() {
    $this->app = Application::getInstance();
    $this->database = $this->app->database;
  }

  public function setData($data) {
    $this->data = $data;
    $this->isUpdated = true;
    $this->isSaved = false;
  }


  public function setAttribute($column, $data) {
    $this->data[$column] = $data;
    $this->isUpdated = true;
    $this->isSaved = false;
  }

  public function update() {
    $this->isUpdated = false;
    $this->isSaved = true;
    var_dump("UPDATE " . $this->tableName . " SET " . $this->arrayAssocToString($this->data) . " WHERE id = " . $this->data['id'] . ";");
    return $this->database->query("UPDATE " . $this->tableName . " SET " . $this->arrayAssocToString($this->data) . " WHERE id = " . $this->data['id'] . ";");
  }

  public function save() {
    $data = $this->data;
  
    $values = array_map(function($key) use ($data) {
      return '\''. $data[$key] . '\'';
    }, $this->fillable);
      
    $this->isUpdated = false;
    $this->isSaved = true;
      

    return $this->database->query("INSERT INTO " . $this->tableName . " (". join(', ', $this->fillable) .")" . " VALUES (" . join(',', $values) . ");");
  }

  public static function findQuery($id, $tableName, $visible) {
    
    $visibleString = join(", ", $visible);

    $database = Application::getInstance()->database;

    $result = $database->query("SELECT " . $visibleString . " FROM " . $tableName . " WHERE id = " . $id);
    if($result) {
      return $result->fetchArray(SQLITE3_ASSOC);
    }
    return null;
  }

  public static function allQuery($tableName, $visible) {
    
    $visibleString = join(", ", $visible);

    $database = Application::getInstance()->database;

    $result =  $database->query("SELECT " . $visibleString . " FROM " . $tableName);
    $array_return  = [];
    while($row = $result->fetchArray(SQLITE3_ASSOC)) {
      array_push($array_return, $row);
    }

    return $array_return;
    
  }


  private function arrayAssocToString($arrayAssoc) {
    return join(',', array_map(function($key, $value) {
      return $key . ' = \'' . $value . '\'';
    }, array_keys($arrayAssoc), $arrayAssoc ));
  }

  private function array_map_assoc(callable $function, array $data) {
    return array_column(array_map($function, array_keys($data), $data), 1, 0);
  }

}
