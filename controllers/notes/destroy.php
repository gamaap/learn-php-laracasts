<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

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
