<?php


// EJERCICIO CON EL PRINCIPIO DE ABIERTO EXTENSIÓN / CERRADO MODIFICACIÓN(OCP)

/* Ejercicio:

   Descripción: Tienes una clase Figura con métodos para dibujar diferentes formas
   (círculo, cuadrado, triángulo) utilizando condicionales.

   Objetivo: Refactoriza el código para que puedas agregar nuevas figuras sin modificar
   la clase existente.

*/

require_once './Figure.php';
require_once __DIR__ . "/../includes/app.php";



$newFigure = new Figure(new Triangulo);
$newFigure->showMessage();
$newFigure = new Figure(new Circulo);
$newFigure->showMessage();
$newFigure = new Figure(new Rombo);
$newFigure->showMessage();

$newFigure->showsize(new Great);
$newFigure->showsize(new Small);
