<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$result = $db->query("SELECT id FROM users WHERE name = 'John'")->find();
$currentUserId = $result ? $result['id'] : '';

$notes = $db->query("SELECT * FROM notes WHERE user_id = " . $currentUserId)->get();

view('notes/index.view.php', [
  'heading' => 'My Notes',
  'notes' => $notes
]);