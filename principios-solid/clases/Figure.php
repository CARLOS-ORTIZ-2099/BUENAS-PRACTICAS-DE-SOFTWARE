<?php

namespace Clases;

/* Ejercicio:

  Descripción: Tienes una clase Figura con métodos para dibujar diferentes formas (círculo, cuadrado, triángulo) 
  utilizando condicionales.
  Objetivo: Refactoriza el código para que puedas agregar nuevas figuras sin modificar la clase existente.
  Recurso: Consulta el documento Ejercicios propuestos principios SOLID para obtener ejemplos similares.​
*/



/* El problema con esta clase es que si más adelante quisieramos agregar más
   formas tendriamos que modifica las clase drawFigure y eso podría 
   conllevar a que el código existente pueda romperse.
   En lugar de eso debriamos trabajar con abstracciones de tal forma que 
   cualquier cambio que se quisiera hacer a futuro no se necesite tocar la 
   clase, es decir abierto para la extensión pero cerrado para la 
   modificación. 
*/

/* class Figure
{

  public function drawFigure(string $figure)
  {
    if ($figure === 'circulo') {
      debuguear("esto es un circulo");
    } else if ($figure === 'cuadrado') {
      debuguear("esto es un cuadrado");
    } else if ($figure === 'triangulo') {
      debuguear("esto es un triangulo");
    }
  }
} 
*/

// El código corregido se vería así 👇


interface Forma
{
  public function message();
}



class Triangulo implements Forma
{
  public function message()
  {
    debuguear("esto es un triangulo");
  }
}

class Rombo implements Forma
{
  public function message()
  {
    debuguear("esto es un rombo");
  }
}

class Circulo implements Forma
{
  public function message()
  {
    debuguear("esto es un circulo");
  }
}

interface Size
{
  public function showSize();
}


class Great implements Size
{
  public function showSize()
  {
    debuguear("esto es de tamaño grande");
  }
}

class Small implements Size
{
  public function showSize()
  {
    debuguear("esto es de tamaño pequeño");
  }
}


class Figure
{
  private $figure;
  private $size;
  public function __construct(Forma $figure)
  {
    $this->figure = $figure;
  }

  public function showMessage()
  {
    $this->figure->message();
  }
  public function showsize(Size $size)
  {
    $this->size = $size;
    $this->size->showSize();
  }
}
