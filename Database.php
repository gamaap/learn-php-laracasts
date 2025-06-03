<?php 

class Database
{
  public PDO $conn;

  public function __construct()
  {
    $dsn = 'mysql:host=localhost;port=3306;dbname=myapp;user=root;charset=utf8mb4';
    
    $this->conn = new PDO($dsn);
  }

  public function query($query)
  {
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    
    return $stmt;
  }
}