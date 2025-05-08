<?php
class Items extends ConnectDb
{

  protected $id;
  protected $name;
  protected $price;
  protected $category;



  public static function getAll()
  {
    $query = "SELECT * FROM items;";
    $result = self::$db->query($query);
    $result = self::processData($result);
    return $result;
  }

  public static function processData($result)
  {
    $storage = [];

    while ($row  = $result->fetch_assoc()) {
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
