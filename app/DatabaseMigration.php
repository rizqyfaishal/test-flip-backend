<?php
namespace App;

class DatabaseMigration {

  private $dbConnection = null;
  private $migrationFolder = './database/migrations';

  public function __construct($dbConnection) {
    $this->dbConnection = $dbConnection;
  }

  public function createMigrationTable() { 
    $this->createTable();
  }

  public function migrate() {
    $listFiles = scandir($this->migrationFolder, SCANDIR_SORT_ASCENDING);

    for($i = 2;$i < count($listFiles); $i++) {
      try {
        $filename = $listFiles[$i];

        $query = 'SELECT * from migrations WHERE filename = "' . $filename . '";';
        $result = $this->dbConnection->query($query)->fetchArray(SQLITE3_ASSOC);
        
        if(!$result) {
          $queryFromFile = file_get_contents($this->migrationFolder . '/' . $filename);

          $resultMigration = $this->dbConnection->query($queryFromFile);
          if($resultMigration) {
            $queryMigration = 'INSERT INTO migrations (\'filename\', \'status\') VALUES (\'' . $filename . '\', \'migrated\');';
            $ret = $this->dbConnection->exec($queryMigration);
            if($ret) {
              print($filename . ' Migrated Successfully' . "\n");
            }
          }
        } 
      } catch(Exception $e) {
        print($e);
      }
    }
  }

  public function status() {
    $result = $this->dbConnection->query(
      "SELECT * FROM migrations;"
    );

    while($row = $result->fetchArray(SQLITE3_ASSOC)) {
      print($row['id']  . '     ' .  $row['filename']  . '    ' . $row['status'] . '    ' . $row['flag']  . '     ' . $row['created_at'] . "\n");
    }
  }

  public function createTable() {
    $this->dbConnection->query(
      "CREATE TABLE IF NOT EXISTS migrations (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        filename VARCHAR(255) NOT NULL,
        status VARCHAR(20) NOT NULL,
        flag INTEGER,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
      );"
    );
  }

  public function insertMigration($filename) {

  }
}
