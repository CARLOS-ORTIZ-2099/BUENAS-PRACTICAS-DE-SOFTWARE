<?php


/* 🧾 1. Gestor de Tareas (To-Do List)
      Descripción: Una aplicación que permite crear, editar, completar y eliminar tareas.

      Principios SOLID aplicados:

      SRP (Responsabilidad Única): Separar las clases de gestión de tareas, interfaz de usuario y almacenamiento.

      OCP (Abierto/Cerrado): Permitir la extensión de funcionalidades sin modificar las clases existentes.

*/

require_once  __DIR__ . "/../../includes/app.php";
require_once __DIR__ . "/../Routes.php";
require_once __DIR__ . "/controllers/TaskController.php";



$newRoute = new Routes();
$newRoute->get('/', [TaskController::class, 'initial']);
$newRoute->get('/task', [TaskController::class, 'showTask']);
$newRoute->get('/crear', [TaskController::class, 'createTask']);
$newRoute->post('/crear', [TaskController::class, 'createTask']);
$newRoute->post('/eliminar', [TaskController::class, 'deleteTask']);
$newRoute->get('/editar', [TaskController::class, 'editTask']);
$newRoute->post('/editar', [TaskController::class, 'editTask']);
$newRoute->get('/change-state', [TaskController::class, 'changeTaskState']);
$newRoute->get('/priority-change', [TaskController::class, 'changeTaskPriority']);
$newRoute->post('/priority-change', [TaskController::class, 'changeTaskPriority']);
$newRoute->get('/priority-high', [TaskController::class, 'priorityHigh']);


/* debuguear($newRoute); */

$newRoute->execute();
