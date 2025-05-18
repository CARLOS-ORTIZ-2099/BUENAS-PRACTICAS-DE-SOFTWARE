<?php

require_once __DIR__ . "/../models/User.php";

class UserController
{

  // registrarse
  static function registerController(Routes $route)
  {
    session_start();
    $message = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $newUser = new User($_POST);
      $newUser->passwordHash();
      $result = $newUser->register();
      $message = $result
        ? ' se registro correctamente'
        : 'ocurrio un error intenta luego';
    }

    $route->render([
      'view' => '/pages/form-auth',
      'message' => $message
    ]);
  }

  // iniciar session
  static function loginController(Routes $route)
  {
    session_start();
    $message = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $userFound = User::search_user($_POST['email']);
      if (!$userFound) {
        $message = 'usuario no encontrado';
      } else {
        $user = new User($_POST);
        $result = $user->passwordVerify($userFound['password']);
        if ($result) {
          $_SESSION['user'] = [
            'name' => $userFound['name'],
            'email' => $userFound['email'],
            'rol_id' => $userFound['rol_id'],
            'id' => $userFound['id']
          ];
          header('Location:/');
        } else {
          $message = 'no reconocido';
        }
      }
    }

    $route->render([
      'view' => '/pages/form-auth',
      'loginPage' => true,
      'message' => $message
    ]);
  }

  // cerrar session
  static function logoutController(Routes $route)
  {
    session_start();
    $_SESSION = [];
    session_destroy();
    header('Location:/');
  }
}
