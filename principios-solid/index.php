<?php
require_once "./includes/app.php";



use Clases\ReporteVentas;
use Clases\CalculateSales;
use Clases\CreateDashboard;
use Clases\SendEmails;

use Clases\Figure;
use Clases\Triangulo;
use Clases\Circulo;
use Clases\Rombo;
use Clases\Great;
use Clases\Small;

use Clases\Animal;
use Clases\Perro;
use Clases\Pez;

use Clases\Robot;
use Clases\Humano;

use Clases\Interruptor;
use Clases\Bombilla;
use Clases\Consola;



// EJERCICIO CON EL PRINCIPIO DE REPSONSABILIDAD ÚNICA (SRP)

/* Este principio nos dice qué cada clase debe enfocarse en hacer sólo una
   cosa, esto no quiere decir que una clase deba tener solamente un metodo,
   lo qué dice es que los metodos de esa clase tiene que cumplir o girar 
   en torno a un sólo proposito.   
*/

$newReporteVentas = new ReporteVentas();
$newReporteVentas->showMessage();

$newCalculateSales = new CalculateSales;
$totalSales = $newCalculateSales->calculateSales(date('D-M-Y'));

$createDashboard = new CreateDashboard;
$createDashboard->createDashboard($totalSales);

$sendEmail = new SendEmails('correo@correo.com');
$sendEmail->sendMessageEmail();


// EJERCICIO CON EL PRINCIPIO DE ABIERTO EXTENSIÓN / CERRADO MODIFICACIÓN(OCP)


$newFigure = new Figure(new Triangulo);
$newFigure->showMessage();
$newFigure = new Figure(new Circulo);
$newFigure->showMessage();
$newFigure = new Figure(new Rombo);
$newFigure->showMessage();

$newFigure->showsize(new Great);
$newFigure->showsize(new Small);



// EJERCICIO CON EL PRINCIPIO DE SUSTITUCIÓN DE LISKOV (LSP)

$newAnimal = new Animal;

$newPerro = new Perro;
$newPerro->hacerSonido();


$newPez = new Pez;
$newPez->hacerSonido();



// EJERCICIO CON EL PRINCIPIO DE SEGREGACIÓN DE INTERFACES (ISP)

$newRobot = new Robot;
$newRobot->trabajar();


$newHumano = new Humano;
$newHumano->comer();



// EJERCICIO CON EL PRINCIPIO DE INVERSIÓN DE DEPENDENCIAS (DIP)
$newInterruptor = new Interruptor(new Bombilla);
$newInterruptor->ActiveAccion();

$newInterruptor = new Interruptor(new Consola);
$newInterruptor->ActiveAccion();
