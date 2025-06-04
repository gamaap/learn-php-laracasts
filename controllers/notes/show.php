<?php

use Core\Database;
use Core\Response;

$config = require base_path('config.php');
$db = new Database($config['database']);

$result = $db->query("SELECT id FROM users WHERE name = 'John'")->find();
$currentUserId = $result ? $result['id'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_GET['id']
  ])->findOrFail();
  
  authorize($note['user_id'] === $currentUserId);

  $db->query("DELETE FROM notes WHERE id = :id", [
    'id' => $_POST['id']
  ]);

  header('location: /notes');
  exit();
} else {
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
}