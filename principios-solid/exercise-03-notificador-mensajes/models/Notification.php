<?php


interface i_email_notification
{
  public function sendMessage($data);
  public function getType();
}

interface i_sms_notification
{
  public function sendMessage($data);
  public function getType();
}


class NotificacionEmail implements i_email_notification
{
  public function sendMessage($data)
  {
    debuguear("enviando mensaje de email al : " . $data);
  }
  public function getType()
  {
    return "EMAIL";
  }
}

class NotificacionSms implements i_sms_notification
{
  public function sendMessage($data)
  {
    debuguear("enviando mensaje de sms al : " . $data);
  }
  public function getType()
  {
    return "SMS";
  }
}





class User extends ConnectDb
{

  protected $nombre;
  protected $valorTipoNotificacion;
  protected $tipoNotificacion;
  public static $notificacion;

  public function __construct($params, $notificacion)
  {
    $this->nombre = $params['nombre'] ?? null;
    $this->valorTipoNotificacion = $params['valorTipoNotificacion'];
    $this->tipoNotificacion = $notificacion->getType();
    self::$notificacion = $notificacion;
  }

  public function save()
  {
    self::$notificacion->sendMessage($this->valorTipoNotificacion);
    $query = "INSERT INTO notificaciones (nombre, valorTipoNotificacion, tipoNotificacion) VALUES ('{$this->nombre}', '{$this->valorTipoNotificacion}', '{$this->tipoNotificacion}');";
    self::$db->query($query);
  }
}
//$userNuevo = new User(['name' => ''], new NotificacionEmail);
