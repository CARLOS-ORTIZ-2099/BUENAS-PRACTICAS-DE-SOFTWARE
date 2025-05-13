<?php



/* - LSP (Sustitución de Liskov): Utilizar herencia para diferentes tipos de productos que puedan
   sustituirse sin alterar el comportamiento del programa. 
*/

require_once __DIR__ . "/../models/Product.php";

class ProductController
{

  // controlador para mostrar los productos
  public static function showProductsController(Routes $route): void
  {

    $products = Product::getAll();
    $route->render(
      [
        'view' => '/pages/products',
        'products' => $products
      ]
    );
  }

  // controlador para mostrar un producto
  public static function showProductController(Routes $route): void
  {
    $id = $_GET['id'];
    $product = Product::getOne($id);

    $route->render(
      [
        'view' => '/pages/product',
        'product' => $product
      ]
    );
  }

  // controlador para crear los productos
  public static function createProductController(Routes $route): void
  {
    $message = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $newProduct = new Product($_POST);
      // debuguear($newProduct);
      $result =  $newProduct->save();
      if ($result) {
        $message = 'se creo correctamente';
      }
    }

    $route->render(
      [
        'view' => '/pages/form-product',
        'message' => $message
      ]
    );
  }


  // controlador para eliminar los productos
  public static function deleteProductController(Routes $route): void
  {
    $id = $_GET['id'];
    $productDelete = new Product();
    $productDelete->setProperty('id', $id);
    $result = $productDelete->deleteOne();
    if ($result) {
      header('Location: /');
    }
  }


  // controlador para editar los productos
  public static function editProductController(Routes $route): void
  {
    $id = $_GET['id'];
    $product = Product::getOne($id);


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $product = new Product($_POST);
      $product->setProperty('id', $id);
      $result = $product->updateOne();
      if ($result) {
        header('Location: /');
      }
    }

    $product = $product->getProperties();
    $route->render(
      [
        'view' => '/pages/form-product',
        'product' => $product,
      ]
    );
  }
}
