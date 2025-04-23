<?php
require_once "./includes/app.php";

// EJERCICIO CON EL PRINCIPIO DE REPSONSABILIDAD ÚNICA (SRP)

/* Este principio nos dice qué cada clase debe enfocarse en hacer sólo una
   cosa, esto no quiere decir que una clase deba tener solamente un metodo,
   lo qué dice es que los metodos de esa clase tiene que cumplir o girar 
   en torno a un sólo proposito.   
*/

use Clases\ReporteVentas;
use Clases\CalculateSales;
use Clases\Circulo;
use Clases\CreateDashboard;

use Clases\SendEmails;
use Clases\Triangulo;
use Clases\Figure;
use Clases\Great;
use Clases\Rombo;
use Clases\Small;

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
