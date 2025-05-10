<?php




interface INotification
{
  public function sendMessage($data);
  public function getType();
}

class NotificacionEmail implements INotification
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

class NotificacionSms implements INotification
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

// aqui implmento otra notificacion
class NotificacionFB implements INotification
{
  public function sendMessage($data)
  {
    debuguear("enviando mensaje de fb al : " . $data);
  }
  public function getType()
  {
    return "FB";
  }
}



class User extends ConnectDb
{

  protected $nombre;
  protected $valorTipoNotificacion;
  protected $tipoNotificacion;
  protected $notificacion;

  public function __construct($params, INotification $notificacion)
  {
    $this->nombre = $params['nombre'] ?? null;
    $this->valorTipoNotificacion = $params['valorTipoNotificacion'];
    $this->tipoNotificacion = $notificacion->getType();
    $this->notificacion = $notificacion;
  }

  public function save()
  {
    $this->notificacion->sendMessage($this->valorTipoNotificacion);
    $query = "INSERT INTO notificaciones (nombre, valorTipoNotificacion, tipoNotificacion) VALUES ('{$this->nombre}', '{$this->valorTipoNotificacion}', '{$this->tipoNotificacion}');";
    self::$db->query($query);
  }
}
//$userNuevo = new User(['name' => ''], new NotificacionEmail);
