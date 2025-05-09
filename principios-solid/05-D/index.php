<?php


// EJERCICIO CON EL PRINCIPIO DE INVERSIÓN DE DEPENDENCIAS (DIP)

/* Ejercicio:

   Descripción: Tienes una clase Interruptor que crea una instancia de Bombilla directamente
   y la enciende.

   Objetivo: Refactoriza el código para que Interruptor dependa de una abstracción, permitiendo
   cambiar la implementación de Bombilla sin modificar Interruptor.

*/

require_once "./Class.php";
require_once __DIR__ . "/../includes/app.php";



$newInterruptor = new SwitchClass(new Lightbulb);
$newInterruptor->ActiveAccion();

$newInterruptor = new SwitchClass(new Console);
$newInterruptor->ActiveAccion();
