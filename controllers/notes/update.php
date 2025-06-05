<?php 

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$result = $db->query("SELECT id FROM users WHERE name = 'John'")->find();
$currentUserId = $result ? $result['id'] : '';

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
  'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

// validate a form
$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
  $errors['body'] = 'A body is required and cannot be more than 1,000 characters.';
}

if (count($errors)) {
  return view('notes/edit.view.php', [
  'heading' => 'Edit Notes',
  'errors' => $errors,
  'note' => $note
]);
}

$db->query('UPDATE notes SET body = :body WHERE id = :id', [
  'id' => $_POST['id'],
  'body' => $_POST['body']
]);

header('location: /notes');
exit();