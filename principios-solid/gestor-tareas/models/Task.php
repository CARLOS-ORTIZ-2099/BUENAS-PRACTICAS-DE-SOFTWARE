<?php

require_once "ConnectDb.php";;


interface i_FuncionatiesForModelTask
{
  // esta función se agrego de último
  public static function changeState($state, $id);

  public static function changePriority($priority, $id);
}


class NewFuncionalitiesModelTask
extends ConnectDb implements i_FuncionatiesForModelTask
{
  protected $priority;
  public static function changeState($state, $id)
  {
    $query = "UPDATE task SET state = {$state} WHERE id = {$id} ;";
    $result = self::$db->query($query);
    return $result;
  }
  public static function changePriority($priority, $id)
  {
    $query = "UPDATE task SET priority = '{$priority}' WHERE id = {$id} ;";
    $result = self::$db->query($query);
    return $result;
  }
}



class Task extends NewFuncionalitiesModelTask
{

  private $state;
  private $id;
  private $title;
  private $description;
  private $category;
  static $messages = [];

  public function __construct($data = [])
  {
    $this->state = $data['state'] ?? false;
    $this->title = $data['title'] ?? null;
    $this->description = $data['description'] ?? null;
    $this->category = $data['category'] ?? null;
  }

  // obtiene en un arreglo las propieddaes de la instancia actual, esto
  // por que como las propieddaes son privadas no puedo acceder a ellas desde fuera
  // de la clase.
  public function getProperties()
  {
    $array = [];
    foreach ($this as $clave => $valor) {
      $array[$clave] = $valor;
    }
    return $array;
  }

  // resetea las propiedades de la instancia actual
  public function resetProperties()
  {

    foreach ($this as $clave => $valor) {
      if ($clave !== 'id' || $clave !== 'state') {
        $this->$clave = '';
      }
    }
  }

  // obtiene una propiedad en especifico
  public function getProperty($key)
  {
    return $this->$key;
  }
  // setea una propiedad en especifico
  public function setProperty($key, $value)
  {
    $this->$key = $value;
  }

  // valida ciertos campos de de la instancia
  public function validar()
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
  public function createTask()
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
  //muestra las tareas
  public static function showTasks()
  {
    /* lógica para ver todas las tareas */
    $query = "SELECT * FROM task";
    $result = self::$db->query($query);
    if ($result->num_rows < 1) {
      self::$messages['info']['task'] = 'aun no hay tareas';
      return;
    }
    $storage = self::processData($result);
    return $storage;
  }
  // muestra una tarea en especifico
  public static function showTask($id)
  {
    /* lógica para ver una tarea */
    $query = "SELECT * FROM task WHERE id = {$id}";
    $result = self::$db->query($query);
    if ($result->num_rows < 1) {
      self::$messages['info']['task'] = 'no existe la tarea';
      return;
    }
    $storage = self::processData($result);
    return array_shift($storage);
  }
  // elimina una tarea en especifico
  public function deleteTask()
  {
    $query = "DELETE FROM task WHERE id = {$this->id}";
    $result = self::$db->query($query);
    return $result;
  }
  // edita una tarea en especifico
  public function editTask()
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
  public static function processData($result)
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
  static function getMessages()
  {
    return self::$messages;
  }
}
