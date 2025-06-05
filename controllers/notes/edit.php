<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$result = $db->query("SELECT id FROM users WHERE name = 'John'")->find();
$currentUserId = $result ? $result['id'] : '';

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
  'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/edit.view.php', [
  'heading' => 'Edit Notes',
  'errors' => [],
  'note' => $note
]);