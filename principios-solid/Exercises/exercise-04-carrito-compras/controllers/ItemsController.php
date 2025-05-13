<?php

require_once __DIR__ . "/../models/Items.php";


class itemsController
{
  // controlador para obtener todos los productos de la tienda
  static function init(Routes $route)
  {
    $items = Items::getAll();

    $route->render([
      'view' => '/pages/inicio',
      'items' => $items
    ]);
  }
}
