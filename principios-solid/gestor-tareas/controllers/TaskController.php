<?php

require_once "models/Task.php";


interface i_FuncionatiesForTask
{
  // esta función se agrego de último
  public static function changeStateTask(Routes $route);
  public static function priorityChangeTask(Routes $route);
}


class NewFuncionalities implements i_FuncionatiesForTask
{
  public static function changeStateTask(Routes $route)
  {
    $id = $_GET['id'];
    $changeStateTask = Task::showTask($id);
    $state = $changeStateTask->getProperty('state');
    if ($state == 1) {
      $state = 0;
    } else {
      $state = 1;
    }
    $result = Task::changeState($state, $id);
    if ($result) {
      header('Location: /task?id=' . $id);
    }
  }

  public static function priorityChangeTask(Routes $route)
  {
    $id = $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $priority = $_POST['priority'];
      $result =  Task::changePriority($priority, $id);
      if ($result) {
        header("Location: /");
      }
    }
    $route->render(
      [
        'view' => '/pages/priority-page'
      ]
    );
  }
}



class TaskController extends NewFuncionalities
{
  // LAS FUNCIONALIDADES DE AQUÍ YA ESTABAN PREVIAMENTE DEFINIDAS
  //mostrar todas las tareas
  public static function inicio(Routes $route)
  {
    // obtenemos un arreglo de instancias
    $tasks = Task::showTasks();
    $messages = Task::getMessages();

    $route->render(
      [
        'view' => '/pages/inicio',
        'info' => $messages['info'] ?? [],
        'tasks' => $tasks
      ]
    );
  }

  // mostrar una tarea en especifico
  public static function showTask(Routes $route)
  {
    $paramId = $_GET['id'] ?? null;
    if (!is_numeric($paramId)) {
      debuguear('no es un numero');
    }

    $task = Task::showTask($paramId);

    $route->render(
      [
        'view' => '/pages/task',
        'task' => $task
      ]
    );
  }

  // crear una tarea
  public static function createTask(Routes $route)
  {

    $newTask = new Task;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $newTask = new Task($_POST);
      $messages = $newTask->validar();
      if (empty($messages)) {
        $newTask->createTask();
        $newTask->resetProperties();
      }
    }
    $messages = Task::getMessages();
    // obtener las propiedades del objeto
    $newTask = $newTask->getProperties();

    $route->render(
      [
        'view' => '/pages/formTask',
        'errors' => $messages['errors'] ?? [],
        'success' => $messages['success'] ?? [],
        'task' => $newTask
      ]
    );
  }

  // eliminar una tarea
  public static function deleteTask(Routes $route)
  {
    $id = $_POST['id'];
    $deleteTask = new Task();
    $deleteTask->setProperty('id', $id);
    $result = $deleteTask->deleteTask();
    if ($result) {
      header('Location: /');
    }
  }

  // editar una tarea
  public static function editTask(Routes $route)
  {


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $task = new Task($_POST);
      $task->setProperty('id', $_POST['id']);
      $messages = $task->validar();
      if (empty($messages)) {
        $result = $task->editTask();
        $task->resetProperties();
      }
    } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      $id = $_GET['id'];
      $task = Task::showTask($id);
    }

    $messages = Task::getMessages();

    $task = $task->getProperties();
    $route->render(
      [
        'view' => '/pages/formTask',
        'task' => $task,
        'edit' => true,
        'errors' => $messages['errors'] ?? [],
        'success' => $messages['success'] ?? [],
      ]
    );
  }
}
