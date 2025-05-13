<?php




interface Notification
{
  public function sendMessage($data): string;
  public function getType(): string;
}

class EmailNotification implements Notification
{
  public function sendMessage($data): string
  {
    return "enviando mensaje de email al : " . $data;
  }
  public function getType(): string
  {
    return "EMAIL";
  }
}

class SmsNotification implements Notification
{
  public function sendMessage($data): string
  {
    return "enviando mensaje de sms al : " . $data;
  }
  public function getType(): string
  {
    return "SMS";
  }
}

// aqui implmento otra notificacion
class FBNotification implements Notification
{
  public function sendMessage($data): string
  {
    return "enviando mensaje de fb al : " . $data;
  }
  public function getType(): string
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

  public function __construct($params, Notification $notificacion)
  {
    $this->nombre = $params['nombre'] ?? null;
    $this->valorTipoNotificacion = $params['valorTipoNotificacion'];
    $this->tipoNotificacion = $notificacion->getType();
    $this->notificacion = $notificacion;
  }

  public function save(): array
  {
    $message = $this->notificacion->sendMessage($this->valorTipoNotificacion);
    $query = "INSERT INTO notificaciones (nombre, valorTipoNotificacion, tipoNotificacion) VALUES ('{$this->nombre}', '{$this->valorTipoNotificacion}', '{$this->tipoNotificacion}');";
    $result = self::$db->query($query);
    return [$result, $message];
  }
}
//$userNuevo = new User(['name' => ''], new NotificacionEmail);
