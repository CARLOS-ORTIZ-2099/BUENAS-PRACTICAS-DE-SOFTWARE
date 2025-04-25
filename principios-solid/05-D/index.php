<?php


// EJERCICIO CON EL PRINCIPIO DE INVERSIÓN DE DEPENDENCIAS (DIP)

/* Ejercicio:

   Descripción: Tienes una clase Interruptor que crea una instancia de Bombilla directamente
   y la enciende.

   Objetivo: Refactoriza el código para que Interruptor dependa de una abstracción, permitiendo
   cambiar la implementación de Bombilla sin modificar Interruptor.

*/

require_once "./Interruptor.php";
require_once __DIR__ . "/../includes/app.php";



$newInterruptor = new Interruptor(new Bombilla);
$newInterruptor->ActiveAccion();

$newInterruptor = new Interruptor(new Consola);
$newInterruptor->ActiveAccion();
