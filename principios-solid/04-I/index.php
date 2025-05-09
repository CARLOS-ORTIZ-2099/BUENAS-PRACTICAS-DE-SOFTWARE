<?php


// EJERCICIO CON EL PRINCIPIO DE SEGREGACIÓN DE INTERFACES (ISP)

/* Ejercicio:

   Descripción: Tienes una interfaz Trabajador con métodos trabajar() y comer(). 
   La clase Robot implementa esta interfaz pero no necesita el método comer().

   Objetivo: Divide la interfaz en interfaces más específicas para que las clases 
   solo implementen los métodos que necesitan.
  
*/

require_once "./Class.php";
require_once __DIR__ . "/../includes/app.php";



$newRobot = new Robot;
$newRobot->work();

$newHumano = new Humano;
$newHumano->eat();
