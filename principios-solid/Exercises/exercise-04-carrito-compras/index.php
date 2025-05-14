<!-- 
## 🛒 4. Carrito de Compras Simplificado

Descripción: Una aplicación que permite agregar y eliminar productos de un carrito, y calcular el total.

Principios SOLID aplicados:

- SRP: Clases separadas para la gestión del carrito y el cálculo de precios.

- OCP: Facilitar la adición de nuevos métodos de cálculo de precios sin modificar las clases existentes.
-->


<?php
require_once  __DIR__ . "/../../includes/app.php";
require_once __DIR__ . "/../Routes.php";
require_once __DIR__ . "/controllers/ItemsController.php";
require_once __DIR__ . "/controllers/CarritoController.php";

$newRoute = new Routes();
$newRoute->get('/', [itemsController::class, 'init']);
$newRoute->post('/addToCart', [CarritoController::class, 'addToCartController']);
$newRoute->get('/viewCart', [CarritoController::class, 'viewCartController']);
$newRoute->post('/quantityUpdate', [CarritoController::class, 'quantityUpdateController']);
$newRoute->post('/removeProduct', [CarritoController::class, 'removeProductController']);







$newRoute->execute();
