<?php

class Book extends ConnectDb
{

  private $id;
  private $title;
  private $genre;
  private $publication;
  private $author_id;
  private $availables;


  public function __construct($params = [])
  {
    $this->id = $params['id'] ?? null;
    $this->title = $params['title'] ?? null;
    $this->genre = $params['genre'] ?? null;
    $this->publication = $params['publication'] ?? null;
    $this->author_id = $params['author_id'] ?? null;
    $this->availables = $params['availables'] ?? null;
  }

  public static function getAll(): array
  {
    $query = "SELECT * FROM books";
    $result = self::$db->query($query);
    $data = self::processData($result);
    return $data;
  }

  public static function processData($result): array
  {
    $storage = [];

    while ($row  = $result->fetch_assoc()) {

      $storage[] = $row;
    }
    return $storage;
  }
  public static function getOne($id)
  {
    $query = "SELECT * FROM books WHERE id = {$id}";
    $result = self::$db->query($query);
    $data = self::processData($result);
    return array_shift($data);
  }
  public function quantityDiscount()
  {

    $query = "UPDATE books SET availables = availables-1 WHERE id = {$this->id} AND availables > 0;";
    return self::$db->query($query);
  }
}
