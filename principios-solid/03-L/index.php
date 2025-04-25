<?php


// EJERCICIO CON EL PRINCIPIO DE SUSTITUCIÓN DE LISKOV (LSP)

/* Ejercicio:

   Descripción: Tienes una clase base Animal con un método hacerSonido(). Las clases derivadas
   Perro y Pez implementan este método, pero Pez lanza una excepción porque no emite sonido.

   Objetivo: Refactoriza la jerarquía de clases para que todas las subclases puedan sustituir a
   la clase base sin errores.

   Recurso: Revisa los ejemplos en el repositorio Software-ibero-segundo-semestre/Principios-SOLID. 
*/
require_once "./Animal.php";
require_once __DIR__ . "/../includes/app.php";



$newAnimal = new Animal;
$newPerro = new Perro;
$newPerro->hacerSonido();


$newPez = new Pez;
$newPez->hacerSonido();
