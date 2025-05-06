<?php


/*Principios SOLID aplicados:

- ISP (Segregación de Interfaces): Crear interfaces específicas para cada tipo de notificación.

- DIP (Inversión de Dependencias): Las clases de alto nivel dependen de abstracciones, no de implementaciones concretas. 

*/

/* interface i_email_notification
{
  public function sendEmail();
}

interface i_sms_notification
{
  public function sendSms();
}


class NotificationEmail extends Notification
implements i_email_notification
{
  public function sendEmail() {}
}


class NotificationSms extends Notification
implements i_sms_notification
{
  public function sendSms() {}
}

 */


/* 
abstract class Notification extends ConnectDb
{
  protected $medio = '';

  public function __construct($medio)
  {
    $this->medio = $medio;
  }

  public function save()
  {
    $query = "";
    $result = self::$db->query($query);
    return $result;
  }
}
 */