<?php

require 'Validator.php';

$config = require 'config.php';
$db = new Database($config['database']);

$heading = "Create Notes";
$currentUser = $db->query("SELECT id FROM users WHERE name = 'John'")->find();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $errors = [];

  if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body is required and cannot be more than 1,000 characters.';
  }

  if (empty($errors)) {
    $db->query("INSERT INTO notes (body, user_id) VALUES (:body, :user)", [
      'body' => $_POST['body'],
      'user' => $currentUser['id']
    ]);
  }
}

require 'views/note-create.view.php';