<?php

namespace Clases;


/* Ejercicio:

  Descripción: Tienes una clase Interruptor que crea una instancia de Bombilla directamente y la enciende.

  Objetivo: Refactoriza el código para que Interruptor dependa de una abstracción, permitiendo cambiar la
  implementación de Bombilla sin modificar Interruptor.
  Recurso: Consulta los ejemplos en el documento Asignación 2 - Principios Solid. 

*/




/* Aquí el código funciona cómo se espera el problema es que la clase 
   Interruptor depende directamente de una clase concreta(Bombilla), si
   más adelante quisieramos cambiar Bombilla por consola tendriamos qué
   tocar la clase Interruptor lo que podría causar fallas a futuro con el
   código existente.
*/

/* 
class Bombilla
{
  public function encender()
  {
    debuguear("se enciende la bombilla");
  }
}

class Consola
{
  public function encender()
  {
    debuguear("se enciende la consola");
  }
}

class Interruptor
{
  private $bombilla;


  public function __construct()
  {
    $this->bombilla = new Bombilla;
  }

  public function useBombilla()
  {
    $this->bombilla->encender();
  }
} 
*/

// El código corregido se vería así 👇

interface Aparato
{
  public function encender();
}

class Bombilla implements Aparato
{
  public function encender()
  {
    debuguear("se enciende la bombilla");
  }
}

class Consola implements Aparato
{
  public function encender()
  {
    debuguear("se enciende la consola");
  }
}

class Interruptor
{
  private $aparato;
  public function __construct(Aparato $aparato)
  {
    $this->aparato = $aparato;
  }

  public function ActiveAccion()
  {
    $this->aparato->encender();
  }
}
