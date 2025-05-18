<!-- 
  Descripción: Una aplicación para gestionar libros, incluyendo su préstamo y devolución.

  Principios SOLID aplicados:

  - SRP: Clases separadas para la gestión de libros y usuarios.

  - LSP: Permitir que diferentes tipos de usuarios (estudiantes, profesores) interactúen con el sistema sin alterar su comportamiento.
-->


<?php
require_once  __DIR__ . "/../../includes/app.php";
require_once __DIR__ . "/../Routes.php";
require_once __DIR__ . "/controllers/UserController.php";
require_once __DIR__ . "/controllers/BookController.php";
require_once __DIR__ . "/controllers/LoansController.php";

$newRoute = new Routes();

$newRoute->get('/', [BookContorller::class, 'init']);
$newRoute->get('/register', [UserController::class, 'registerController']);
$newRoute->post('/register', [UserController::class, 'registerController']);
$newRoute->get('/login', [UserController::class, 'loginController']);
$newRoute->post('/login', [UserController::class, 'loginController']);
$newRoute->get('/logout', [UserController::class, 'logoutController']);
$newRoute->post('/loan', [LoansController::class, 'loanController']);







$newRoute->execute();
