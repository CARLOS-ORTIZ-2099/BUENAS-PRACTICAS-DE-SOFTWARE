<?php

require_once "models/Notification.php";

class NotificationController
{

  public static function initController(Routes $route)
  {
    $message = '';
    $tiposNotificacion = [
      'email' => NotificacionEmail::class,
      'sms'   => NotificacionSms::class,
      'fb'    => NotificacionFB::class
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      debuguear($_POST);

      foreach ($tiposNotificacion as $key => $clase) {
        if (!empty($_POST[$key])) {
          $notificacion = new $clase();
          $newUser = new User([
            'nombre' => $_POST['nombre'],
            'valorTipoNotificacion' => $_POST[$key]
          ], $notificacion);
          $newUser->save();
          $message = '';
          break;
        } else {
          $message = 'el tipo es obligatorio';
        }
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
