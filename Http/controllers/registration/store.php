<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

// validate the form input
$errors = [];
if (!Validator::email($email)) {
  $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 7, 255)) {
  $errors['password'] = 'Please provide a password at least 7 characters.';
}

if (!empty($errors)) {
  return view('registration/create.view.php', [
    'errors' => $errors
  ]);
}

$db = App::resolve(Database::class);

// check if the email already exists
$user = $db->query('SELECT * FROM users WHERE email = :email', [
  'email' => $email
])->find();

if($user) {
  header("location: /");
  die();
} else {
  $db->query("INSERT INTO users (name, email, password) VALUES ('Dummy', :email, :password)", [
    ':email' => $email,
    ':password' => password_hash($password, PASSWORD_BCRYPT)
  ]);

  $auth = new Authenticator;
  $auth->login($user);

  header('location: /');
  die();
}
