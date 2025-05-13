<?php

require_once __DIR__ . "/../models/Notification.php";

class NotificationController
{

  // controlador que muetsra el formulario de registro
  public static function initController(Routes $route)
  {
    $message = '';
    $tiposNotificacion = [
      'email' => EmailNotification::class,
      'sms'   => SmsNotification::class,
      'fb'    => FBNotification::class
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      //debuguear($_POST);
      foreach ($tiposNotificacion as $key => $clase) {
        if (!empty($_POST[$key])) {
          $notificacion = new $clase();
          $newUser = new User([
            'nombre' => $_POST['nombre'],
            'valorTipoNotificacion' => $_POST[$key]
          ], $notificacion);
          $response = $newUser->save();
          if ($response[0]) {
            $message = $response[1];
          }

          break;
        } else {
          $message = 'el tipo es obligatorio';
        }
      }
    }


    $route->render(
      [
        'view' => '/pages/inicio',
        'message' => $message
      ]
    );
  }
}
