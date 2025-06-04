<?php

use Core\Database;
use Core\Response;

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUser = $db->query("SELECT id FROM users WHERE name = 'John'")->find();

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
  'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUser['id']);

if ($note['user_id'] !== $currentUser['id']) {
  abort(Response::FORBIDDEN);
}

view('notes/show.view.php', [
  'heading' => 'Note',
  'note' => $note
]);