<?php

class ConnectDb
{

  //static $db = null;
  static $db = null;

  static function connect($db)
  {
    self::$db = $db;
  }
}
