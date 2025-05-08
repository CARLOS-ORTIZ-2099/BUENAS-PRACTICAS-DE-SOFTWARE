<!-- 
## 🛒 4. Carrito de Compras Simplificado

Descripción: Una aplicación que permite agregar y eliminar productos de un carrito, y calcular el total.

Principios SOLID aplicados:

- SRP: Clases separadas para la gestión del carrito y el cálculo de precios.

- OCP: Facilitar la adición de nuevos métodos de cálculo de precios sin modificar las clases existentes.
-->


<?php
require_once  "../includes/app.php";
require_once "./Routes.php";
require_once "./controllers/ItemsController.php";
require_once "./controllers/CarritoController.php";

$newRoute = new Routes();
$newRoute->get('/', [itemsController::class, 'inicio']);
$newRoute->post('/addToCart', [CarritoController::class, 'addToCart']);






$newRoute->execute();
