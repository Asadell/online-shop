<?php
namespace App\Core;

use PDO;
use PDOException;

class Database {
  private $conn;

  public function __construct()
  {
    $this->conn = $this->setConnection();
  }

  protected function setConnection(){
    try {
      $host=getenv('DB_HOST');
      $user=getenv('DB_USER');
      $pass=getenv('DB_PASS');
      $db=getenv('DB_NAME');
      $port=getenv('DB_PORT');
      $dsn = "pgsql:host=$host;port=$port;dbname=$db;";
      $conn = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
      return $conn;
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function qry($query, $params = array()){
    $stmt = $this->conn->prepare($query);
    $stmt->execute($params);
    return $stmt;
  }
}