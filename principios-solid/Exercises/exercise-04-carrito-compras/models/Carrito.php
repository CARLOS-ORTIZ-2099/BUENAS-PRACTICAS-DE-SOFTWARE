
<?php

interface MethodTypeCalculate
{
  public function calculateMethod();
}


class CalculateWithDiscount implements MethodTypeCalculate
{
  public function calculateMethod()
  {
    // aqui la lógica para calcular los productos sin descuento
  }
}

class CalculateNotDiscount implements MethodTypeCalculate
{
  public function calculateMethod()
  {
    // aqui la lógica para calcular los productos con descuento
  }
}

class CalculateDicountDouble implements MethodTypeCalculate
{
  public function calculateMethod()
  {
    // aqui la lógica para calcular los productos con descuento doble
  }
}





class ManageShoppingCart extends ConnectDb
{
  private $id;
  private $item_id;
  private $user_id;
  private $quantity;

  public function __construct($params = [])
  {
    $this->id = $params['id'] ?? null;
    $this->item_id = $params['itemId'] ?? null;
    $this->user_id = $params['userId'] ?? null;
    $this->quantity = $params['quantity'] ?? 1;
  }
  // Recalcar que para la mayoria de los métodos, estaremos calculando
  // constantemente el total a pagar
  // añadir productos
  public function addProduct()
  {
    // comprobar si el id de producto  ya esta en el carrito
    // lo comprobamos de esta manera : 
    // buscamos si hay un registro cuyo itemId sea igual al que tenemos y si el user_id sea igual al que este logueado
    $item = $this->getOneCartItem();
    // si esta solo aumentamos su cantidad
    if ($item) {
      $newQuantity = $this->quantity + $item['quantity'];
      $query = "UPDATE cart_items SET quantity = {$newQuantity}
      WHERE item_id = {$this->item_id} AND user_id = {$this->user_id}  
      ";
      $result = self::$db->query($query);
      return $result;
    }
    // si no esta, añadir producto
    else {
      $query = "INSERT INTO cart_items (item_id, user_id, quantity)
      VALUES({$this->item_id}, {$this->user_id}, {$this->quantity});
      ";
      $result = self::$db->query($query);
      return $result;
    }
  }

  // obtiene un producto de la tabla cart_items
  public function getOneCartItem()
  {
    $query = "SELECT * FROM cart_items 
    WHERE item_id = '{$this->item_id}' AND user_id = '{$this->user_id}'";
    $result = self::$db->query($query);
    $result = self::processData($result);
    $result = array_shift($result);
    return $result;
  }
  // obtener todos los productos
  public function getAllProducts()
  {
    // obtenemos todos los productos del carrito de un usuario
    $query = "SELECT items.*, cart_items.id as id_item_cart, cart_items.quantity,
    cart_items.user_id
    FROM cart_items
    INNER JOIN items
    ON cart_items.item_id = items.id
    WHERE user_id = {$this->user_id} ;";
    $result = self::$db->query($query);
    $result = self::processData($result);
    //debuguear($result);
    return $result;
  }

  // comvierte el resultado de la consulta en un objeto
  public static function processData($result)
  {
    $storage = [];

    while ($row  = $result->fetch_assoc()) {
      $storage[] = $row;
    }
    return $storage;
  }

  // disminuir productos
  public function reduceProduct($product)
  {
    // reducir la cantidad de un determinado producto

    // dicha cantidad sera de 1 por defecto

    // si el producto llegase a 0 unidades entonces lo 
    // removemos del carrito

  }
  // remover un producto
  public function removeProduct($product)
  {
    // buscamos el producto en el carrito
    // luego lo quitamos del carrito
  }
  // remover todos los productos
  public function removeAllProducts()
  {
    // eliminamos todos los items del carrito
  }

  // obtener cantidad de productos
  public function getQuantityProducts()
  {
    // devolver la cantidad de items que contiene el carrito
  }
}
