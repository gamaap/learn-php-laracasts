<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$result = $db->query("SELECT id FROM users WHERE name = 'John'")->find();
$currentUserId = $result ? $result['id'] : '';

$notes = $db->query("SELECT * FROM notes WHERE user_id = " . $currentUserId)->get();

view('notes/index.view.php', [
  'heading' => 'My Notes',
  'notes' => $notes
]);