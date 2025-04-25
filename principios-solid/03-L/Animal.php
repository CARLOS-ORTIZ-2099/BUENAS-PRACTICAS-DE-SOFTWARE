<?php


/* El problema aquí es que el metodo que se hereda a las clases hijas no se adapta
   correctamente a la clase pez ya que modifica la definicion que este metodo tiene 
   en la clase base
*/

/* 
  class Animal
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

interface speak
{
  public function hacerSonido();
}
// hacemos una implementación dfiferente para cada clase
class Perro implements speak
{
  public function hacerSonido()
  {
    debuguear("estos hacen sonido");
  }
}

class Pez implements speak
{
  public function hacerSonido()
  {
    debuguear("estos no hacen sonido");
  }
}

class Animal
{
  public function hacerSonido()
  {
    debuguear("esta haciendo sonido");
  }
}
