<?php

namespace models;

class Model
{
  protected $tableName = "";

  protected function getData($itemName, $value)
  {
    $sql = "SELECT * FROM $this->tableName WHERE $itemName = :item";
    $stmt = \Db::connect()->prepare($sql);
    $stmt->bindParam(":item", $value);
    $stmt->execute();
    return $stmt->fetch();
  }

  protected function insert($id, string $itemName, $item): bool
  {
    try {
      $sql = "UPDATE $this->tableName SET $itemName = :item WHERE user_id = :id";
      $stmt = \Db::connect()->prepare($sql);
      $stmt->bindParam(":item", $item);
      $stmt->bindParam(":id", $id);
      $stmt->execute();
      return true;
    } catch (\PDOException $e) {
      return false;
    }
  }
  
}
