<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$result = $db->query("SELECT id FROM users WHERE name = 'John'")->find();
$currentUserId = $result ? $result['id'] : '';

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
  'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query("DELETE FROM notes WHERE id = :id", [
  'id' => $_POST['id']
]);

header('location: /notes');
exit();