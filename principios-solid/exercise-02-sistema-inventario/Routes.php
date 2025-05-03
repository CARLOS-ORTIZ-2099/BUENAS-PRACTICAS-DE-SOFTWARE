
<?php

class Routes
{

  private $getUrls = [];
  private $postUrls = [];

  public function get($name, $route)
  {
    $this->getUrls[$name] = $route;
  }

  public function post($name, $route)
  {
    $this->postUrls[$name] = $route;
  }

  public function execute()
  {
    $method = $_SERVER['REQUEST_METHOD'];
    $url = $_SERVER['PATH_INFO'] ?? '/';

    if ($method === 'GET') {
      $urlfind = $this->getUrls[$url] ?? null;
    } else {
      $urlfind = $this->postUrls[$url] ?? null;
    }
    if (!$urlfind) {
      debuguear("no existe la ruta");
      die();
    } else {
      // ejecutar el metodo(perteneciente a una clase) asociado a esa ruta
      call_user_func($urlfind, $this);
    }
  }

  // aqui recibimos como parametro el contenido que se rederizara y será
  //dinamico para cada vista.
  public function render($params = [])
  {
    // independientemente de donde esteme siempre vamos a renderizar 
    // la vista que va a ser compartida por todas, cómo por ejemplo el 
    // layout.
    /* debuguear($params); */
    foreach ($params as $key => $value) {
      $$key = $value;
    }

    $routeViewComplement = "./views" . $view . ".php";

    require_once "./views/main.php";
  }
}
