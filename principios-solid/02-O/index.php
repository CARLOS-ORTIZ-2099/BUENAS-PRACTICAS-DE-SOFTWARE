<?php


// EJERCICIO CON EL PRINCIPIO DE ABIERTO EXTENSIÓN / CERRADO MODIFICACIÓN(OCP)

/* Ejercicio:

   Descripción: Tienes una clase Figura con métodos para dibujar diferentes formas
   (círculo, cuadrado, triángulo) utilizando condicionales.

   Objetivo: Refactoriza el código para que puedas agregar nuevas figuras sin modificar
   la clase existente.

*/

require_once './Class.php';
require_once __DIR__ . "/../includes/app.php";



$newFigure1 = new Figure(new Triangle, new Big);
$newFigure1->showFigure();
$newFigure1->showSize();

$newFigure2 = new Figure(new Circle, new Small);
$newFigure2->showFigure();
$newFigure2->showSize();

$newFigure3 = new Figure(new Diamond, new Big);
$newFigure3->showFigure();
$newFigure3->showSize();

// implementar un rectangulo
$newFigure4 = new Figure(new Rectangle, new Big);
$newFigure4->showFigure();
$newFigure4->showSize();
