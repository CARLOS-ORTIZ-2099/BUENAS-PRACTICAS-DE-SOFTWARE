<?php

interface TaskFunctionalities
{
  public function execute($db): bool;
}

// clase para cambiar estado de las tareas
class ChangeStateMethod implements TaskFunctionalities
{
  static $db;
  private $taskStatus;
  private $taskId;
  public function __construct(array $params)
  {
    $this->taskStatus = $params['taskStatus'];
    $this->taskId = $params['taskId'];
  }
  // recibe 2 parametros $taskStatus, $taskId
  public function execute($db): bool
  {
    self::$db = $db;
    $query = "UPDATE task SET state =  {$this->taskStatus} 
    WHERE id = {$this->taskId}";
    $result = self::$db->query($query);
    return $result;
  }
}
// clase para cambiar prioridad
class ChangePrioritymethod implements TaskFunctionalities
{
  static $db;
  private $taskPriority;
  private $taskId;

  public function __construct(array $params)
  {
    $this->taskPriority = $params['taskPriority'];
    $this->taskId = $params['taskId'];
  }
  // recibe 2 parametros $taskPriority, $taskId
  public function execute($db): bool
  {
    self::$db = $db;
    $query = "UPDATE task SET priority = '{$this->taskPriority}'
    WHERE id = {$this->taskId}";
    //debuguear($query, true);
    $result = self::$db->query($query);
    return $result;
  }
}
// nueva clase que implementa la funcionalidad de añadir tareas con prioridad alta
class PriorityHightTask implements TaskFunctionalities
{
  static $db;
  public function execute($db): bool
  {
    self::$db = $db;
    $query = "INSERT INTO task (state, title, description, category, priority)
    VALUES('0', 'titulo prueba 1', 'nueva descripcion 1', 'trabajo', 'Alta');
    ";
    //debuguear($query, true);
    $result = self::$db->query($query);
    return $result;
  }
}



class Task extends ConnectDb
{
  private $priority;
  private $state;
  private $id;
  private $title;
  private $description;
  private $category;
  static $messages = [];
  static $TaskFunctionalities;

  public function __construct($data = [])
  {
    $this->priority = $data['priority'] ?? null;
    $this->state = $data['state'] ?? false;
    $this->title = $data['title'] ?? null;
    $this->description = $data['description'] ?? null;
    $this->category = $data['category'] ?? null;
  }
  // metodo que recibe una abstraccion de TaskFunctionalities para ejecutar su método execute
  public static function processMethodsStatics(TaskFunctionalities $TaskFunctionalities): bool
  {
    self::$TaskFunctionalities = $TaskFunctionalities;
    return self::$TaskFunctionalities->execute(self::$db);
  }

  // obtiene las propieddaes de la instancia en un arreglo
  public function getProperties(): array
  {
    $array = [];
    foreach ($this as $clave => $valor) {
      $array[$clave] = $valor;
    }
    return $array;
  }

  // resetea las propiedades de la instancia actual
  public function resetProperties(): void
  {

    foreach ($this as $clave => $valor) {
      if ($clave !== 'id' || $clave !== 'state') {
        $this->$clave = '';
      }
    }
  }

  // obtiene una propiedad en especifico
  public function getProperty($key): string|bool
  {
    return $this->$key;
  }
  // setea una propiedad en especifico
  public function setProperty($key, $value): void
  {
    $this->$key = $value;
  }

  // valida ciertos campos de de la instancia
  public function validate(): array
  {
    if (!trim($this->title)) {
      // static => respeta el contexto y hace referencía a la clase desde donde se llama al método
      // self => ignora el contexto y hace referencia a la clase desde donde se define el método.
      self::$messages['errors']['title'] = 'el titulo es obligatorio';
    }
    if (!trim($this->description)) {
      self::$messages['errors']['description'] = 'la description es obligatoria';
    }
    if (!$this->category) {
      self::$messages['errors']['category'] = 'la categoria es obligatoria';
    }

    return self::$messages;
  }

  // crea una trea
  public function createTask(): void
  {
    $query = "INSERT INTO task (state, title, description, category) 
      VALUES('{$this->state}', '{$this->title}', '{$this->description}', '{$this->category}'); ";

    //debuguear($query);
    $result = self::$db->query($query);

    if ($result) {
      self::$messages['success']['task'] = 'se creo la tarea exitosamente';
    } else {
      self::$messages['errors']['task'] = 'ocurrio un error, intenta luego';
    }
  }

  //muestra las tareas, si hay tareas, caso contrario retorna false
  public static function showTasks(): bool|array
  {
    /* lógica para ver todas las tareas */
    $query = "SELECT * FROM task";
    $taskFounds = self::$db->query($query);
    if ($taskFounds->num_rows < 1) {
      self::$messages['info']['task'] = 'aun no hay tareas';
      return false;
    }
    $storage = self::processData($taskFounds);
    return $storage;
  }

  // muestra una tarea en especifico
  public static function showTask($id): Task|bool
  {
    /* lógica para ver una tarea */
    $query = "SELECT * FROM task WHERE id = {$id}";
    $result = self::$db->query($query);
    if ($result->num_rows < 1) {
      self::$messages['info']['task'] = 'no existe la tarea';
      return false;
    }
    $storage = self::processData($result);
    $data = array_shift($storage);
    return $data;
  }
  // elimina una tarea en especifico
  public function deleteTask(): bool
  {
    $query = "DELETE FROM task WHERE id = {$this->id}";
    $result = self::$db->query($query);
    return $result;
  }
  // edita una tarea en especifico
  public function editTask(): void
  {
    /* lógica para editar contenido y/o titulo de las tareas */
    $query = "UPDATE task SET title = '{$this->title}', description = '{$this->description}', category = '{$this->category}' WHERE id = {$this->id};";
    $result = self::$db->query($query);
    /*  return $result; */
    if ($result) {
      self::$messages['success']['task'] = 'se edito la tarea exitosamente';
    } else {
      self::$messages['errors']['task'] = 'ocurrio un error, intenta luego';
    }
  }

  // convierte los resultados de ciertas consultas en instancias de la clase
  public static function processData($result): array
  {
    $storage = [];

    while ($row  = $result->fetch_assoc()) {
      // creamos una nueva instancia para cada uno de los registros obtenidos
      // en la db
      $obj = new static;
      foreach ($row as $key => $value) {
        if ($value !== null) {
          $obj->$key = $value;
        }
      }
      $storage[] = $obj;
    }
    return $storage;
  }

  // obtiene el arreglo de mensajes
  static function getMessages(): array
  {
    return self::$messages;
  }
}
