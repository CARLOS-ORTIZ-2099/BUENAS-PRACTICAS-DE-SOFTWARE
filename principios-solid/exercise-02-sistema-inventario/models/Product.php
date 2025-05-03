<?php

// continuar aqui
// clase abstracta para heredar método de "tiene delivery"
abstract class ProductDelivery
{

  abstract public function haveDelivery();
}

// recalcar que no todos los productos tendran delivery, ya sea por 
// que depende del precio, marca, ubicación, etc

// esta clase será para los productos que si cuentan con delivery y hereda de ProductDelivery
class NotieneDelivery extends ProductDelivery
{
  public function haveDelivery()
  {
    echo "este producto NO tiene delivery";
    return false;
  }
}
// esta clase será para los productos que no cuentan con delivery y hereda de ProductDelivery
class SiTieneDelivery extends ProductDelivery
{
  public function haveDelivery()
  {
    echo "este producto SI tiene delivery";
    return true;
  }
}



class Product extends ConnectDb
{
  private $id;
  private $name;
  private $price;
  private $continent;
  private $quantity;
  private $category;
  private $applyDelivery;


  public function __construct($params = [])
  {
    $this->id = $params['id'] ?? null;
    $this->name = $params['name'] ?? null;
    $this->price = $params['price'] ?? null;
    $this->continent = $params['continent'] ?? null;
    $this->quantity = $params['quantity'] ?? null;
    $this->category = $params['category'] ?? null;
    $this->applyDelivery = $params['applyDelivery'] ?? null;
  }

  public static function getAll()
  {
    $query = "SELECT * FROM products";
    $result = self::$db->query($query);
    $data = self::processData($result);
    return $data;
  }

  public static function getOne($id)
  {
    $query = "SELECT * FROM products WHERE id = $id";
    $result = self::$db->query($query);
    $data = self::processData($result);
    return array_shift($data);
  }

  public function save()
  {

    $delivery = $this->checkContinentCategory();
    $this->applyDiscount($delivery);

    $query = "INSERT INTO products (name, price, continent, quantity,category,applyDelivery) 
    VALUES ('{$this->name}', {$this->price}, '{$this->continent}', {$this->quantity}, '{$this->category}', '{$this->applyDelivery}');";
    $result =  self::$db->query($query);
    return $result;
  }

  public function applyDiscount(ProductDelivery $delivery)
  {
    $boolean = $delivery->haveDelivery();

    $this->applyDelivery = $boolean;
  }

  public function checkContinentCategory()
  {
    $validsContinents = ['america', 'asia', 'europa'];
    $validsCategories = ['tecnologia', 'videojuegos', 'libros'];


    if (in_array($this->continent, $validsContinents) && in_array($this->category, $validsCategories)) {
      return new SiTieneDelivery();
    } else {
      return new NotieneDelivery();
    }
  }

  public function deleteOne()
  {
    $query = "DELETE FROM products WHERE id = '{$this->id}';";
    $result = self::$db->query($query);
    return $result;
  }

  public function updateOne()
  {
    $delivery = $this->checkContinentCategory();
    $this->applyDiscount($delivery);
    $query = "UPDATE products SET name = '{$this->name}', price = {$this->price}, continent = '{$this->continent}', quantity ={$this->quantity}, category ='{$this->category}' ,applyDelivery = '{$this->applyDelivery}' WHERE id = {$this->id} ;";
    //debuguear($query, true);
    $result = self::$db->query($query);
    return $result;
  }


  public function getProperties()
  {
    $array = [];
    foreach ($this as $clave => $valor) {
      $array[$clave] = $valor;
    }
    return $array;
  }

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
