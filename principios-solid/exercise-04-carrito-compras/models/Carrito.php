<!-- 
## 🛒 4. Carrito de Compras Simplificado

Descripción: Una aplicación que permite agregar y eliminar productos de un carrito, y calcular el total.

Principios SOLID aplicados:

- SRP: Clases separadas para la gestión del carrito y el cálculo de precios.

- OCP: Facilitar la adición de nuevos métodos de cálculo de precios sin modificar las clases existentes.
-->
<?php

interface MethodTypeCalculate
{
  public function calculateMethod();
}

// metodos de calculo de precios 
// - calculo con descuento
// - calculo sin descuento

class CalculateWithDiscount implements MethodTypeCalculate
{
  public function calculateMethod()
  {
    // aqui la lógica para calcular los productos sin descuento
  }
}
class CalculateNotDiscount implements MethodTypeCalculate
{
  public function calculateMethod()
  {
    // aqui la lógica para calcular los productos con descuento
  }
}

class CalculateDicountDouble implements MethodTypeCalculate
{
  public function calculateMethod()
  {
    // aqui la lógica para calcular los productos con descuento doble
  }
}


class CalcutaPricesCart
{
  protected $method;
  public function __construct(MethodTypeCalculate $method)
  {
    $this->method = $method;
  }

  public function calculate()
  {
    $this->method->calculateMethod();
  }
}
/* Logica para que el acrrito de compras se sincronize con su respectivo 
   metodo de pago
   - si la cantidad de items en el carrito no superan las 5 unidades no se le aplica el descuento, caso contrario si se le aplica el descuento

   - si en el carrito del usuario hay items de una determinada categoria 
   (por lo menos 1 de esa categoria) si se le aplica el descuento sin
   importar la cantidad

   - en caso de que la cantidda de items del carrito del usuario sea superior
   a 5 unidades y tenga un producto de la categoria que cumple con el 
   descuento se le aplica doble descuento
*/
class ManageShoppingCart
{
  protected $id;
  protected $productId;
  protected $userId;
  protected $quantity;

  public function addProduct($product)
  {
    // comprobar que si el producto ya esta

    // si esta solo aumentamos su cantidad

    // si no esta añadir producto

  }

  public function removeProduct($product)
  {
    // buscamos el producto en el carrito
    // luego lo quitamos del carrito
  }


  public function lessQuantity()
  {
    // restamos una unidad al producto
    // si se llega a cero sólo lo eliminamos del carrito
  }


  public function MoreQuantity()
  {
    // sumamos una unidad al producto en el carrito

  }

  public function emptyCart()
  {
    // eliminamos todos los items del carrito
  }

  public function getQuantityProducts()
  {
    // devolver la cantidad de items que contiene el carrito
  }
}
