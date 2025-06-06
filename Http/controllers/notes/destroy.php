<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
  'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $_SESSION['user']['user_id']);

$db->query("DELETE FROM notes WHERE id = :id", [
  'id' => $_POST['id']
]);

header('location: /notes');
exit();