<?php

$config = require 'config.php';
$db = new Database($config['database']);

$heading = "Note";
$currentUser = $db->query("SELECT id FROM users WHERE name = 'John'")->fetch();

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
  'id' => $_GET['id']
])->fetch();

if (!$note) {
  abort();
}

if ($note['user_id'] !== $currentUser['id']) {
  abort(Response::FORBIDDEN);
}

require 'views/note.view.php';