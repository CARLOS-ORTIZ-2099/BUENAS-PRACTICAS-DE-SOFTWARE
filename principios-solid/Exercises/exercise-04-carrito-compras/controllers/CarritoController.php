<?php


require_once __DIR__ . "/../models/Carrito.php";
require_once __DIR__ . "/../models/Items.php";

class CarritoController
{
  // controlador para añadir productos
  static function addToCartController(Routes $route)
  {
    // aqui nos comunicamos con el modelo de carrito 
    $quantity = empty($_POST['quantity']) ? '1' : $_POST['quantity'];
    $itemId = $_POST['itemId'];

    $newItemCart = new ManageShoppingCart([
      'itemId' => $itemId,
      'userId' => '1',
      'quantity' => $quantity
    ]);

    $result = $newItemCart->getOneCartItem();

    if ($result) {
      // aumentar
      $newItemCart->setProperty('id', $result['id']);
      $newItemCart->quantityUpdate('+');
    } else {
      $newItemCart->addProduct();
    }


    header('Location:/');
  }

  // controlador para ver productos del carrito
  static function viewCartController(Routes $route)
  {
    $newCart = new ManageShoppingCart([
      'userId' => '1'
    ]);

    $cartItems = $newCart->getAllProducts(
      new CalculateQuantityDiscount,
      new CalculateTypeDiscount
    );
    //debuguear($cartItems, true);
    $route->render([
      'view' => '/pages/cart',
      'cartItems' => $cartItems['result'],
      'quantity' => count($cartItems['result']),
      'totalPagar' => $cartItems['totalPagar'],
      'originalPrice' => $cartItems['originalPrice']
    ]);
  }

  // controlador para actualizar cantidad de productos del carrito
  static function quantityUpdateController(Routes $route)
  {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // debuguear($_POST, true);
      $id = $_POST['id'];
      $quantity = $_POST['quantity'];
      $quantityCurrent = $_POST['quantityCurrent'];

      $updateCart = new ManageShoppingCart([
        'id' => $id,
        'quantity' => $quantity
      ]);
      // sumamos
      if ($_POST['action'] === '+') {
        $updateCart->quantityUpdate('+');
      }
      // restamos
      elseif ($_POST['action'] === '-') {
        if ($quantityCurrent == 1) {
          $updateCart->removeProduct();
        } else {
          $updateCart->quantityUpdate('-');
        }
      }

      header('Location:viewCart');
    }
  }

  // controlador para remover productos del carrito
  static function removeProductController(Routes $route)
  {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'] ?? null;

      $deleteItemCart = new ManageShoppingCart([
        'id' => $id,
        'userId' => '1'
      ]);

      if ($id) {
        $deleteItemCart->removeProduct();
      } else {
        $deleteItemCart->removeAllProducts();
      }

      //debuguear($deleteItemCart);
      header('Location:/viewCart');
    }
  }
}
