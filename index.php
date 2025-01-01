<?php 

require 'functions.php';
// require 'router.php';

// Connect to our MySQL Database
$dsn = "mysql:host=localhost;port=3306;dbname=myapp2;user=root;charset=utf8mb4";

$pdo = new PDO($dsn);

$stmt = $pdo->prepare("SELECT * FROM posts");
$stmt->execute();

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
  echo "<li>" . $post['title'] . "</li>";
}