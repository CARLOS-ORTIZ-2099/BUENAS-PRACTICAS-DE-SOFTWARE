<!-- 
 ## 📦 2. Sistema de Inventario Básico

Descripción: Una aplicación para gestionar productos, incluyendo su adición, eliminación y actualización.

Principios SOLID aplicados:

- SRP: Clases separadas para la lógica de productos y la interfaz de usuario.

- LSP (Sustitución de Liskov): Utilizar herencia para diferentes tipos de productos que puedan sustituirse sin alterar el comportamiento del programa.
-->


<?php
require_once __DIR__ . "/../../includes/app.php";
require_once __DIR__ . "/../Routes.php";
require_once __DIR__ . "/controllers/ProductController.php";


$newRoute = new Routes();

$newRoute->get('/', [ProductController::class, 'showProductsController']);

$newRoute->get('/product', [ProductController::class, 'showProductController']);


$newRoute->post('/crear', [ProductController::class, 'createProductController']);
$newRoute->get('/crear', [ProductController::class, 'createProductController']);

$newRoute->get('/eliminar', [ProductController::class, 'deleteProductController']);

$newRoute->get('/editar', [ProductController::class, 'editProductController']);
$newRoute->post('/editar', [ProductController::class, 'editProductController']);


$newRoute->execute();
