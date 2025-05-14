
<?php

interface CalculationMethod
{
  public function executeCalculation($items): array;
}


class CalculateTypeDiscount implements CalculationMethod
{
  public function executeCalculation($items): array
  {
    //debuguear($items);
    $data = [];
    foreach ($items as $item) {
      if ($item['category'] === 'tecnologia') {
        // aplicar descuento del 5 % del precio del producto
        $descuento = ($item['price'] * 5) / 100;
        $item['precio_original'] =  $item['total_pagar'];
        $item['total_pagar'] = ($item['total_pagar'] - $descuento);
      }
      $data[] = $item;
    }
    return $data;
  }
}


class CalculateQuantityDiscount implements CalculationMethod
{
  public function executeCalculation($items): array
  {
    $totalPagar = 0;
    $originalPrice = false;
    foreach ($items as $item) {
      $totalPagar += $item['total_pagar'];
    }

    // debuguear($totalPagar);
    if (count($items) > 1) {
      $descuento = ($totalPagar * 10) / 100;
      $originalPrice = $totalPagar;
      $totalPagar = $totalPagar - $descuento;
    }
    return [$totalPagar, $originalPrice];
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

  // añadir productos
  public function addProduct()
  {
    $query = "INSERT INTO cart_items (item_id, user_id, quantity)
      VALUES({$this->item_id}, {$this->user_id}, {$this->quantity});
      ";
    $result = self::$db->query($query);
    return $result;
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

  // obtener todos los productos del carrito
  public function getAllProducts(
    CalculationMethod $calculationQuantity,
    CalculationMethod $calculationCategory
  ) {
    $query = "SELECT items.*, 
    cart_items.id as id_item_cart, 
    cart_items.quantity,
    cart_items.user_id,
    cart_items.quantity *items.price as total_pagar
    FROM cart_items
    INNER JOIN items
    ON cart_items.item_id = items.id
    WHERE user_id = {$this->user_id} ;";
    $result = self::$db->query($query);
    $result = self::processData($result);

    $result = $calculationCategory->executeCalculation($result);

    //debuguear($result);

    [$totalPagar, $originalPrice] =
      $calculationQuantity->executeCalculation($result);

    return [
      'result' => $result,
      'totalPagar' => $totalPagar,
      'originalPrice' => $originalPrice
    ];
  }

  // actualizar cantidad
  public function quantityUpdate($operation)
  {
    $query = "UPDATE cart_items SET quantity = quantity $operation {$this->quantity}  WHERE id = {$this->id} ;";
    $result = self::$db->query($query);
    return $result;
  }

  // remover un producto del carrito del usuario
  public function removeProduct()
  {
    $query = "DELETE FROM cart_items WHERE id = {$this->id};";
    self::$db->query($query);
  }

  // remover todos los productos del carrito del usuario
  public function removeAllProducts()
  {
    $query = "DELETE FROM cart_items WHERE user_id = {$this->user_id};";
    self::$db->query($query);
  }

  // procesa el resultado de la consulta en un arreglo asociativo
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
