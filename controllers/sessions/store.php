<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

// validate the form input
$errors = [];
if (!Validator::email($email)) {
  $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password)) {
  $errors['password'] = 'Please provide a valid password.';
}

if (!empty($errors)) {
  return view('sessions/create.view.php', [
    'errors' => $errors
  ]);
}

// match the credential
$user = $db->query("SELECT email, password FROM users WHERE email = :email", [
  ':email' => $email
])->find();

if ($user) {
  if (password_verify($password, $user['password'])) {
    login([
      'email' => $email
    ]);
  
    header('location: /');
    exit();
  }
}

return view('sessions/create.view.php', [
  'errors' => [
    'email' => 'Wrong username or password.'
  ]
]);