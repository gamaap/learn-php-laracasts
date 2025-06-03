<?php 

require 'functions.php';
// require 'router.php';
require 'Database.php';

$db = new Database();
$post = $db->query("SELECT * FROM posts WHERE id = 1")->fetch(PDO::FETCH_ASSOC);

dd($post['title']);
// foreach ($posts as $post) {
//   echo "<li>" . $post['title'] . "</li>";
// }