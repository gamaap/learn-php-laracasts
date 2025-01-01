<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'My Notes';
$currentUserId = 4;

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
  ':id' => $_GET['id']
])->fetch();

if (!$note) {
  abort();
}

if ($note['user_id'] !== $currentUserId) {
  abort(Response::FORBIDDEN);
}

require 'views/note.view.php';