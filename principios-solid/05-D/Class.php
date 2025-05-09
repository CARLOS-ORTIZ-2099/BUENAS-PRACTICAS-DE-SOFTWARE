<?php


/* Aquí el código funciona cómo se espera el problema es que la clase Interruptor
   depende directamente de una clase concreta(Bombilla), si más adelante quisieramos
   cambiar Bombilla por consola tendriamos qué tocar la clase Interruptor lo que
   podría causar fallas a futuro con el código existente.
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

interface Apparatus
{
  public function turnOnDevice(): void;
}

class Lightbulb implements Apparatus
{
  public function turnOnDevice(): void
  {
    debuguear("se enciende la bombilla");
  }
}

class Console implements Apparatus
{
  public function turnOnDevice(): void
  {
    debuguear("se enciende la consola");
  }
}

class SwitchClass
{
  private $apparatus;
  public function __construct(Apparatus $apparatus)
  {
    $this->apparatus = $apparatus;
  }

  public function ActiveAccion(): void
  {
    $this->apparatus->turnOnDevice();
  }
}
