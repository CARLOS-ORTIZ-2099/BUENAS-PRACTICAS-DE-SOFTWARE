<?php


/* El problema con esta clase es que si más adelante quisieramos agregar más
   formas tendriamos que modificar la clase drawFigure y eso podría llevar a 
   que el código existente pueda romperse. En lugar de eso deberiamos trabajar 
   con abstracciones de tal forma que cualquier cambio que se quisiera hacer 
   a futuro no se necesite tocar la clase, es decir abierto para la extensión
   pero cerrado para la modificación. 
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

// interface para las formas
interface Shape
{
  public function drawFigure();
  public function getFigure();
}
// clases que implementan la interface forma
class Triangle implements Shape
{
  protected $figure = 'triangulo';
  public function drawFigure(): void
  {
    // el código aquí
    debuguear("dibujando un triángulo");
  }
  public function getFigure(): string
  {
    return $this->figure;
  }
}

class Diamond implements Shape
{
  protected $figure = 'rombo';
  public function drawFigure(): void
  {
    // el código aquí
    debuguear("dibujando un rombo");
  }
  public function getFigure(): string
  {
    return $this->figure;
  }
}

class Circle implements Shape
{
  protected $figure = 'circulo';
  public function drawFigure(): void
  {
    // el código aquí
    debuguear("dibujando un circulo");
  }
  public function getFigure(): string
  {
    return $this->figure;
  }
}

class Rectangle implements Shape
{
  protected $figure = 'rectangulo';
  public function drawFigure(): void
  {
    // el código aquí
    debuguear("dibujando un rectangulo");
  }
  public function getFigure(): string
  {
    return $this->figure;
  }
}

// interface para los tamaños

interface Size
{
  public function showFigureSize(string $typeFigure);
}

// clases que implementan la interface tamaño
class Big implements Size
{
  public function showFigureSize(string $typeFigure): void
  {
    // el código aquí
    debuguear("el " . $typeFigure . " es de tamaño grande");
  }
}

class Small implements Size
{
  public function showFigureSize(string $typeFigure): void
  {
    // el código aquí
    debuguear("el " . $typeFigure . " es de tamaño pequeño");
  }
}


class Figure
{
  private $figure;
  private $size;
  public function __construct(Shape $figure, Size $size)
  {
    $this->figure = $figure;
    $this->size = $size;
  }

  public function showFigure(): void
  {
    $this->figure->drawFigure();
  }

  public function showSize(): void
  {
    $this->size->showFigureSize($this->figure->getFigure());
  }
}
