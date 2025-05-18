<?php

require_once __DIR__ . "/../models/Book.php";

class BookContorller
{

  static function init(Routes $route)
  {
    session_start();

    $books = Book::getAll();
    $route->render([
      'view' => '/pages/init',
      'books' => $books
    ]);
  }
}
