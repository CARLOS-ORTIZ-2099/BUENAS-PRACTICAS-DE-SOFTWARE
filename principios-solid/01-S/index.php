<?php


// EJERCICIO CON EL PRINCIPIO DE RESPONSABILIDAD ÚNICA (SRP)

/* Ejercicio:

  Descripción: Crea una clase ReporteVentas que actualmente realiza múltiples
  tareas: calcular ventas, generar gráficos y enviar correos electrónicos.
  
  Objetivo: Refactoriza la clase para que cada responsabilidad esté en una 
  clase separada.

*/

require_once './ReporteVentas.php';
require_once __DIR__ . "/../includes/app.php";



$newReporteVentas = new ReporteVentas();
$newReporteVentas->showMessage();

$newCalculateSales = new CalculateSales;
$totalSales = $newCalculateSales->calculateSales(date('D-M-Y'));

$createDashboard = new CreateDashboard;
$createDashboard->createDashboard($totalSales);

$sendEmail = new SendEmails('correo@correo.com');
$sendEmail->sendMessageEmail();
