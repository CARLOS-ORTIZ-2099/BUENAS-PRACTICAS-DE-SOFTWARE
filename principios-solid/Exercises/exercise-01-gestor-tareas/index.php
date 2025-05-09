<?php


/* 🧾 1. Gestor de Tareas (To-Do List)
      Descripción: Una aplicación que permite crear, editar, completar y eliminar tareas.

      Principios SOLID aplicados:

      SRP (Responsabilidad Única): Separar las clases de gestión de tareas, interfaz de usuario y almacenamiento.

      OCP (Abierto/Cerrado): Permitir la extensión de funcionalidades sin modificar las clases existentes.

*/

require_once  "../../includes/app.php";
require_once "../Routes.php";
require_once "./controllers/TaskController.php";

$newRoute = new Routes();
$newRoute->get('/', [TaskController::class, 'inicio']);
$newRoute->get('/task', [TaskController::class, 'showTask']);
$newRoute->get('/crear', [TaskController::class, 'createTask']);
$newRoute->post('/crear', [TaskController::class, 'createTask']);
$newRoute->post('/eliminar', [TaskController::class, 'deleteTask']);
$newRoute->get('/editar', [TaskController::class, 'editTask']);
$newRoute->post('/editar', [TaskController::class, 'editTask']);
$newRoute->get('/change-state', [TaskController::class, 'changeStateTask']);
$newRoute->get('/priority-change', [TaskController::class, 'priorityChangeTask']);
$newRoute->post('/priority-change', [TaskController::class, 'priorityChangeTask']);

/* debuguear($newRoute); */

$newRoute->execute();
