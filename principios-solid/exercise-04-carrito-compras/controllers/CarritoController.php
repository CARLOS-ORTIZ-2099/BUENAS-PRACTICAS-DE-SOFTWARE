<?php


require_once "models/Carrito.php";

class CarritoController
{
  static function addToCart()
  {
    // aqui nos comunicameo con el modelo de carrito 
    $shoppingcart = new ManageShoppingCart();
  }
}
