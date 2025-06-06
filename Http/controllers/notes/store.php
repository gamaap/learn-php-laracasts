<?php 

use Core\App;
use Core\Database;
use Core\Validator;

require base_path('Core/Validator.php');

$db = App::resolve(Database::class);

$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
  $errors['body'] = 'A body is required and cannot be more than 1,000 characters.';
}

if (!empty($errors)) {
  return view('notes/create.view.php', [
    'heading' => 'Create Notes',
    'errors' => $errors
  ]);
}

$db->query("INSERT INTO notes (body, user_id) VALUES (:body, :user)", [
  'body' => $_POST['body'],
  'user' => $_SESSION['user']['user_id']
]);

header('location: /notes');
exit();