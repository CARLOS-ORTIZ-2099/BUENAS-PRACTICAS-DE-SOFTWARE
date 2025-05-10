<?php

require_once __DIR__ . "/../models/Items.php";


class itemsController
{
  static function inicio(Routes $route)
  {
    $items = Items::getAll();

    $route->render([
      'view' => '/inicio',
      'items' => $items
    ]);
  }
}
