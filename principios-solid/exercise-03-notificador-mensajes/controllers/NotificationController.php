<?php

require_once "models/Notification.php";

class NotificationController
{

  public static function initController(Routes $route)
  {
    $message = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      debuguear($_POST);

      if (!$_POST['email'] && !$_POST['sms']) {
        $message = 'el tipo de medio es obligatorio';
      }
      //
      elseif ($_POST['email']) {

        $email = $_POST['email'];

        $newUser = new User([
          'nombre' => $_POST['nombre'],
          'valorTipoNotificacion' => $email
        ], new NotificacionEmail);

        $newUser->save();
      }
      //
      elseif ($_POST['sms']) {

        $sms = $_POST['sms'];

        $newUser = new User([
          'nombre' => $_POST['nombre'],
          'valorTipoNotificacion' => $sms
        ], new NotificacionSms);

        $newUser->save();
      }
    }


    $route->render(
      [
        'view' => '/inicio',
        'message' => $message
      ]
    );
  }
}
