<?php 

class Database
{
  public PDO $conn;

  public function __construct($config, $username = 'root', $password = '')
  {
    $dsn = 'mysql:' . http_build_query($config, '', ';');
    
    $this->conn = new PDO($dsn, $username, $password, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }

  public function query($query, $params = [])
  {
    $stmt = $this->conn->prepare($query);
    $stmt->execute($params);
    
    return $stmt;
  }
}