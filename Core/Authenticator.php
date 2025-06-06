<?php 

namespace Core;

class Authenticator
{
  public function attempt($email, $password)
  {
    $user = App::resolve(Database::class)
        ->query("SELECT * FROM users WHERE email = :email", [
        'email' => $email
    ])->find();

    if ($user) {
      if (password_verify($password, $user['password'])) {
        $this->login([
          'user_id' => $user['id'],
          'email' => $email
        ]);
        return true;
      }
    }
    return false;
  }

  public function login($user)
  {
    $_SESSION['user'] = [
      'email' => $user['email'],
      'user_id' => $user['user_id']
    ];

    session_regenerate_id(true);
  }

  public function logout()
  {
    Session::destroy();
  }
}