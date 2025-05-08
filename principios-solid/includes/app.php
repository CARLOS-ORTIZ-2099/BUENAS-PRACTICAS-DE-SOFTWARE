<?php

require_once __DIR__ . "/functions.php";
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/db.php";
/* require_once __DIR__ . "/../exercise-01-gestor-tareas/models/ConnectDb.php"; */
/* require_once __DIR__ . "/../exercise-02-sistema-inventario/models/ConnectDb.php"; */
/* require_once __DIR__ . "/../exercise-03-notificador-mensajes/models/ConnectDb.php"; */
require_once __DIR__ . "/../exercise-04-carrito-compras/models/ConnectDb.php";


ConnectDb::connect($db);
