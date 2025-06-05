<?php

use Core\App;
use Core\Database;
use Core\Response;

$db = App::resolve(Database::class);

$result = $db->query("SELECT id FROM users WHERE name = 'John'")->find();
$currentUserId = $result ? $result['id'] : '';

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
  'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

if ($note['user_id'] !== $currentUserId) {
  abort(Response::FORBIDDEN);
}

view('notes/show.view.php', [
  'heading' => 'Note',
  'note' => $note
]);