<?php


require_once __DIR__ . "/../models/Carrito.php";
require_once __DIR__ . "/../models/Items.php";

class CarritoController
{
  static function addToCart(Routes $route)
  {
    // aqui nos comunicamos con el modelo de carrito 
    $quantity = empty($_POST['quantity']) ? '1' : $_POST['quantity'];
    $itemId = $_POST['itemId'];

    $item = Items::getOne($itemId);
    // si es un id valido y existe le producto en la db
    if ($item) {
      $newItemCart = new ManageShoppingCart([
        'itemId' => $itemId,
        'userId' => '1',
        'quantity' => $quantity
      ]);
      //debuguear($newItemCart);
      $result = $newItemCart->addProduct();
      if ($result) {
        header('Location:/');
      }
    }
  }

  static function viewCart(Routes $route)
  {
    $newCart = new ManageShoppingCart([
      'userId' => '1'
    ]);

    $cartItems = $newCart->getAllProducts();

    $route->render([
      'view' => '/pages/cart',
      'cartItems' => $cartItems
    ]);
  }
}
