<?php


/* El problema aquí es que el metodo que se hereda a las clases hijas no se adapta
   correctamente a la clase pez ya que modifica la definicion que este metodo tiene 
   en la clase base
*/

/* class Animal
  {
    public function hacerSonido()
    {
      debuguear("esta haciendo sonido");
    }
  }
  class Perro  extends Animal
  {
    public function hacerSonido()
    {
      debuguear("el perro ladra");
    }
  }
  class Pez extends Animal
  {
    public function hacerSonido()
    {
      // esto es una supuesta excepcion
      debuguear("el pez no hace ni un sonido");
    }
  }  
*/


// El código corregido se vería así 👇

// interface para los sonidos de cada tipo de animal
interface Speak
{
  public function doSound(): void;
}

abstract class Animal
{
  protected $name;
  // este constructor al ser un método(método inicializador) tambien se hereda
  // al hacerlo las clases heredadas heredan dicho constructor que se ejecuta al instanciar las clases hijas
  public function __construct(string $name)
  {
    $this->name = $name;
  }
}

// clase para los animales que hablan
class CanDoSound extends Animal implements Speak
{
  public function doSound(): void
  {
    debuguear("el " . $this->name . " si puede hacer sonido");
  }
}
// clase para los animales que no hablan
class CantDoSound extends Animal implements Speak
{
  public function doSound(): void
  {
    debuguear("el " . $this->name . " no puede hacer sonido");
  }
}
