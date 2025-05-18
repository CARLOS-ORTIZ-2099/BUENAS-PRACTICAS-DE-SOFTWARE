<?php


class Loans extends ConnectDb
{
  private  $id;
  private  $user_id;
  private  $book_id;
  private  $loan_date;
  private  $return_date;
  private  $returned;
  private $user;


  public function __construct(User $user, $params = [])
  {
    $this->id = $params['id'] ?? null;
    $this->user_id = $params['user_id'] ?? null;
    $this->book_id = $params['book_id'] ?? null;
    $this->loan_date = $params['loan_date'] ?? date('Y-m-d');
    $this->return_date = $params['return_date'] ?? $user->calculateReturnDate($this->loan_date);
    $this->returned = $params['returned'] ?? false;
    $this->user  = $user;
  }

  public function save()
  {
    $query = "INSERT INTO loans (user_id, book_id, loan_date, return_date,
     returned) VALUES({$this->user_id}, {$this->book_id}, '{$this->loan_date}', '{$this->return_date}', '{$this->returned}')";

    $result = self::$db->query($query);
    return $result;
  }

  public function getAll()
  {
    $query = "SELECT * FROM loans WHERE 
    user_id = {$this->user_id} AND loan_date = '{$this->loan_date}';";
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
}
