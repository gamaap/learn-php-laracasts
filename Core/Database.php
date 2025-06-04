<?php 

namespace Core;

use PDO;
use PDOStatement;

class Database
{
  public PDO $conn;
  public PDOStatement $stmt;

  public function __construct($config, $username = 'root', $password = '')
  {
    $dsn = 'mysql:' . http_build_query($config, '', ';');
    
    $this->conn = new PDO($dsn, $username, $password, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }

  public function query($query, $params = [])
  {
    $this->stmt = $this->conn->prepare($query);
    $this->stmt->execute($params);
    
    return $this;
  }

  public function get()
  {
    return $this->stmt->fetchAll();
  }

  public function find()
  {
    return $this->stmt->fetch();
  }

  public function findOrFail()
  {
    $result =  $this->find();

    if (!$result) {
      abort();
    }
    
    return $result;
  }
}