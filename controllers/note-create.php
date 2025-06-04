<?php

$config = require 'config.php';
$db = new Database($config['database']);

$heading = "Create Notes";
$currentUser = $db->query("SELECT id FROM users WHERE name = 'John'")->find();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $db->query("INSERT INTO notes (body, user_id) VALUES (:body, :user)", [
    'body' => $_POST['body'],
    'user' => $currentUser['id']
  ]);
}

require 'views/note-create.view.php';