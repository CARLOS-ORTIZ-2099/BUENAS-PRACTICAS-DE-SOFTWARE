<?php

/* - LSP: Permitir que diferentes tipos de usuarios (estudiantes,
   profesores) interactúen con el sistema sin alterar su comportamiento. 
*/

/*  
  Este principio de sustitución de liskov nos dice que una clase base, tiene
  que poder ser sustituida por una instancia de una subclase, sin alterar su 
  comportamiento, recalcar que esto no impide que la funcionalidad se 
  extienda si no mas bien que no caiga en contradicciones con lo establecido
  por la base, así mismo cada uno de estos principios prioriza la composición
  antes que la herencia ya que este último genere alto acoplamiento.
*/

/* Pseudocódigo :  
   - crearemos abstracciones para diversos tipos de usuarios como : 
      - Estudiantes
      - Profesores
      - Administradores
      - ...
   - cada uno de estos sin importar su rol, podran adquiriri libros prestados por día, pero según el rol habra ciertas condiciones como : 
     - si es un estudiante sólo se le podra prestar 3 libros por día(siempre 
     y cuando dicho libro este disponible)
     
     - si es un Profesor se le podra prestar 4 libros por día(siempre 
     y cuando dicho libro este disponible) 

     - si es un administrador se le podra prestar 5 libros por día(siempre 
     y cuando dicho libro este disponible) 
      

*/



class User extends ConnectDb
{
  private  $id;
  private  $name;
  private  $email;
  private  $date_registered;
  private  $rol_id;
  private  $password;
  protected $days;

  public function __construct($params = [])
  {
    $this->id = $params['id'] ?? null;
    $this->name = $params['name'] ?? null;
    $this->email = $params['email'] ?? null;
    $this->date_registered = $params['date_registered'] ?? null;
    $this->rol_id = $params['rol_id'] ?? null;
    $this->password = $params['password'] ?? null;
  }

  // insertar un usuario
  public function register(): bool
  {
    try {
      $query = "INSERT INTO library_users (name, email, rol_id, password) VALUES
    ('{$this->name}', '{$this->email}',{$this->rol_id}, '{$this->password}');";
      $result = self::$db->query($query);
      if (!$result) {
        throw new Exception("Error en la inserción: " . self::$db->error);
      }
      return $result;
    } catch (Exception $e) {
      return false;
    }
  }

  public function passwordHash()
  {
    $this->password = password_hash($this->password, PASSWORD_BCRYPT);
  }
  // buscar usuario
  public static function search_user($email)
  {
    $query = "SELECT * FROM library_users WHERE email = '{$email}'";
    $result = self::$db->query($query);
    $result = self::processData($result);
    return array_shift($result);
  }
  // comprobar password
  public function passwordVerify($password)
  {
    $result =  password_verify($this->password, $password);
    if ($result) {
      return true;
    }
    return false;
  }

  public static function processData($result)
  {
    $storage = [];

    while ($row  = $result->fetch_assoc()) {
      $storage[] = $row;
    }
    return $storage;
  }

  public function calculateReturnDate($param) {}
  public function booksPerDay() {}
}


class Estudiante extends User
{
  // los estudiantes pueden rentar un libro por 3 dias

  public function calculateReturnDate($param)
  {
    $this->days = 3;
    $fechaFin = date('Y-m-d', strtotime($param . '+' . $this->days . ' days'));
    return $fechaFin;
  }

  // 3 libros por dia
  public function booksPerDay()
  {
    return 3;
  }
}

class Profesor extends User
{
  // los profesores por 4 dias
  public function calculateReturnDate($param)
  {
    $this->days = 4;
    $fechaFin = date('Y-m-d', strtotime($param . '+' . $this->days . ' days'));
    return $fechaFin;
  }
  // 4 libros por dia
  public function booksPerDay()
  {
    return 4;
  }
}

class Administrador extends User
{
  // los administradores pueden hacerlo por 5 dias
  public function calculateReturnDate($param)
  {
    $this->days = 5;
    $fechaFin = date('Y-m-d', strtotime($param . '+' . $this->days . ' days'));
    return $fechaFin;
  }

  // 5 libros por dia
  public function booksPerDay()
  {
    return 5;
  }
}
