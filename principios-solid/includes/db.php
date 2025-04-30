<?php

// conexion a mysqli

$db = new mysqli('localhost', 'root', '', 'solid');

if (!$db) {
  die('fallo la conexión');
}
