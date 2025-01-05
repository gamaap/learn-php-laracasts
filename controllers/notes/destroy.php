<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = 4;

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
  ':id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

// form was submitted, delete the current post
$db->query("DELETE FROM notes WHERE id = :id", [
  ':id' => $_POST['id']
]);

header('Location: /notes');
die();
