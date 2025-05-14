<?php
class Items extends ConnectDb
{

  private $id;
  private $name;
  private $price;
  private $category;


  // obtiene todos los items de la tienda
  public static function getAll()
  {
    $query = "SELECT * FROM items;";
    $result = self::$db->query($query);
    $result = self::processData($result);
    return $result;
  }

  // obtiene  un item especifico
  public static function getOne($itemId)
  {
    $query = "SELECT * FROM items WHERE id = '{$itemId}'";
    $result = self::$db->query($query);
    $result = self::processData($result);
    return array_shift($result);
  }

  // convierte el resultado de la query en una rray de instancias
  public static function processData($result)
  {
    $storage = [];

    while ($row  = $result->fetch_assoc()) {
      $storage[] = $row;
    }
    return $storage;
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
}
