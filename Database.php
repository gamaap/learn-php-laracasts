<?php 

class Database
{
  public PDO $conn;

  public function __construct($config, $username = 'root', $password = '')
  {
    $dsn = 'mysql:' . http_build_query($config, $username, $password);
    
    $this->conn = new PDO($dsn, 'root', '', [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }

  public function query($query)
  {
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    
    return $stmt;
  }
}