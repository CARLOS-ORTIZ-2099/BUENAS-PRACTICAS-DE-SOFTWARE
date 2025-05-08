<?php


/* Esta clase de aqui tiene muchas responsabilidades desde sacar el reporte 
   de ventas hasta mandar email de confirmación, así mimo tiene inconsitencias
   en el nombre de clase y métodos ya que se hace una combinación entre español
   e ingles, y tambien hay métodos que indican que tipo de dato devuelven y otros
   no, de esa manera tambien aplicamos las buenas practicas del código limpio.
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


class SalesCalculate
{
  public function salesCalculate(string $date): int
  {
    // código para calcular las ventas
    debuguear("calculando ventas con fecha" . " " . $date);
    return 20;
  }
}

class CreateDashboard
{
  public function createDashboard(int $number): void
  {
    // código para crear el dashboard
    debuguear("creando dashboard con este numero : " . $number);
    for ($i = 1; $i <= $number; $i++) {
      debuguear($i);
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

  public function sendMessageEmail(): void
  {
    // código para enviar los mensajes
    debuguear("hola estamos enviando un mensaje a " . $this->email . "por favor comfirma tu cuenta");
  }
}
