<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// validate a form input
if (!Validator::email($email)) {
  $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($name, 1, 255)) {
  $errors['name'] = 'Please provide a valid name';
}

if (!Validator::string($password, 7, 255)) {
  $errors['password'] = 'Please provide password at least 7 characters';
}

if (!empty($errors)) {
  return view('registration/create.view.php', [
    'errors' => $errors
  ]);
}

$user = $db->query('SELECT * FROM users WHERE email = :email', [
  'email' => $email
])->find();

if ($user) {
  header('location: /');
  exit();
} else {
  $db->query("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)", [
    'name' => $name,
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT)
  ]);

  login([
    'email' => $email,
    'user_id' => $db->lastId()
  ]);

  header('location: /');
  exit();
}