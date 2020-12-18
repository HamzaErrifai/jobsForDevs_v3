<?php

class Db
{
  public static function connect()
  {
    $pdo = new PDO('mysql:host=localhost;dbname=jobsfordevs', "root", "");
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
  }
}
