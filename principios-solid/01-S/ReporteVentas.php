<?php


/* Esta clase de aqui tiene muchas responsabilidades desde sacar el reporte 
   de ventas hasta mandar email de confirmación 
*/

/* class ReporteVentas
  {
    private $email;

    public function __construct($email)
    {
      $this->email = $email;
    }
    public function showMessage()
    {
      echo "<br/> aquí te muestro el reporte de ventas<br/>";
    }
    public function calculateSales(string $date): int
    {
      echo "<br/>calculando ventas con fecha" . " " . $date . "<br/>";
      return 20;
    }
    public function createDashboard(int $number)
    {
      echo "<br/> creando dashboard con este numero " . $number;
      for ($i = 1; $i <= $number; $i++) {
        echo "<br/>" . $i . "<br/>";
      }
    }

    public function sendMessageEmail()
    {
      echo "hola estamos enviando un mensaje a " . $this->email . "por favor comfirma tu cuenta";
    }
  } 
*/

// El código refactorizado se vería así 👇

class ReporteVentas
{
  public function showMessage()
  {
    echo "<br/> aquí te muestro el reporte de ventas<br/>";
  }
}

class CalculateSales
{
  public function calculateSales(string $date): int
  {
    echo "<br/>calculando ventas con fecha" . " " . $date . "<br/>";
    return 20;
  }
}

class CreateDashboard
{
  public function createDashboard(int $number)
  {
    echo "<br/> creando dashboard con este numero " . $number;
    for ($i = 1; $i <= $number; $i++) {
      echo "<br/>" . $i . "<br/>";
    }
  }
}

class SendEmails
{
  private $email;

  public function __construct($email)
  {
    $this->email = $email;
  }

  public function sendMessageEmail()
  {
    echo "hola estamos enviando un mensaje a " . $this->email . "por favor comfirma tu cuenta";
  }
}
