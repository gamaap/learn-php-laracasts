<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
  'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $_SESSION['user']['user_id']);

view('notes/edit.view.php', [
  'heading' => 'Edit Notes',
  'errors' => [],
  'note' => $note
]);