<?php

require_once __DIR__ . "/../models/Task.php";




class TaskController
{
  // controlador para crear tareas con prioridad alta por defecto
  public static function priorityHigh(Routes $route): void
  {
    $result = Task::processMethodsStatics(new PriorityHightTask);
    if ($result) {
      header('Location: /');
    }
  }
  // controlador para cambiar estado
  public static function changeTaskState(Routes $route): void
  {
    $taskId = $_GET['id'];
    $taskFound = Task::showTask($taskId);
    $taskStatus = $taskFound->getProperty('state');
    if ($taskStatus == 1) {
      $taskStatus = 0;
    } else {
      $taskStatus = 1;
    }
    // $result = Task::changeState($taskStatus, $taskId);
    $result = Task::processMethodsStatics(new ChangeStateMethod(
      [
        'taskStatus' => $taskStatus,
        'taskId' => $taskId
      ]
    ));
    if ($result) {
      header('Location: /task?id=' . $taskId);
    }
  }
  // controlador para cambiar prioridad
  public static function changeTaskPriority(Routes $route): void
  {
    $taskId = $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $taskPriority = $_POST['priority'];
      //$result =  Task::changePriority($taskPriority, $taskId);
      $result =  Task::processMethodsStatics(new ChangePrioritymethod([
        'taskPriority' => $taskPriority,
        'taskId' => $taskId
      ]));
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

  // controlador para mostrar todas las tareas
  public static function initial(Routes $route): void
  {
    // obtenemos un arreglo de instancias
    $tasksFound = Task::showTasks();
    $messages = Task::getMessages();

    $route->render(
      [
        'view' => '/pages/inicio',
        'info' => $messages['info'] ?? [],
        'tasks' => $tasksFound
      ]
    );
  }

  // controlador para mostrar una tarea en especifico
  public static function showTask(Routes $route): void
  {
    $taskId = $_GET['id'] ?? null;
    //debuguear($taskId, true);
    if (!is_numeric($taskId)) {
      debuguear('no es un numero');
    }

    $taskFound = Task::showTask($taskId);

    $route->render(
      [
        'view' => '/pages/task',
        'task' => $taskFound
      ]
    );
  }

  // controlador para crear una tarea
  public static function createTask(Routes $route): void
  {

    $newTask = new Task;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $newTask = new Task($_POST);
      $messages = $newTask->validate();
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

  // controlador para eliminar una tarea
  public static function deleteTask(Routes $route): void
  {
    $taskId = $_POST['id'];
    $taskToDelete = new Task();
    $taskToDelete->setProperty('id', $taskId);
    $result = $taskToDelete->deleteTask();
    if ($result) {
      header('Location: /');
    }
  }

  // controlador para editar una tarea
  public static function editTask(Routes $route): void
  {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $taskToEdit = new Task($_POST);
      $taskToEdit->setProperty('id', $_POST['id']);
      $messages = $taskToEdit->validate();
      if (empty($messages)) {
        $result = $taskToEdit->editTask();
        $taskToEdit->resetProperties();
      }
    } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      $taskId = $_GET['id'];
      $taskToEdit = Task::showTask($taskId);
    }

    $messages = Task::getMessages();

    $taskToEdit = $taskToEdit->getProperties();
    $route->render(
      [
        'view' => '/pages/formTask',
        'task' => $taskToEdit,
        'edit' => true,
        'errors' => $messages['errors'] ?? [],
        'success' => $messages['success'] ?? [],
      ]
    );
  }
}
