<?php

require_once __DIR__ . "/../models/Loans.php";




class LoansController
{

  static function loanController(Routes $route)
  {
    $roles = [
      '1' => Estudiante::class,
      '2' => Profesor::class,
      '3' => Administrador::class,
    ];

    session_start();
    $book_id = $_POST['book_id'];
    $user_id = $_SESSION['user']['id'];
    $rol_id = $_SESSION['user']['rol_id'];
    $rolselected = $roles[$rol_id];
    $rolselected = new $rolselected;
    $newLoan = new Loans($rolselected, [
      'user_id' => $user_id,
      'book_id' => $book_id
    ]);


    $data = $newLoan->getAll();
    $days = $rolselected->booksPerDay();
    if (count($data) >= $days) {
      $_SESSION['error'] = 'no puedes agregra mas por este dia';
      header('Location:/');
      return;
    }

    $bookFound = Book::getOne($book_id);
    // evaluar cantidad
    if ($bookFound['availables'] > 0) {
      // disminuir
      $result = $newLoan->save();
      if ($result) {
        $book =  new Book(['id' => $book_id]);
        $resultDiscount = $book->quantityDiscount();
        if ($resultDiscount) {
          header('Location:/');
        }
      }
    }
    header('Location:/');
  }
}
