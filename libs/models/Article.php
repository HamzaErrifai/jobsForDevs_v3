<?php

namespace models;

class Article extends Model
{
  protected $tableName = "articles";
  protected function getAllData($itemName, $value)
  {
    $sql = "SELECT * FROM $this->tableName WHERE $itemName = :item ORDER BY created_at DESC";
    $stmt = \Db::connect()->prepare($sql);
    $stmt->bindParam(":item", $value);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  protected function getAllDataByOrder($order)
  {
    $sql = "SELECT * FROM $this->tableName INNER JOIN users ON $this->tableName.user_id=users.user_id $order LIMIT 10;";
    $stmt = \Db::connect()->query($sql);
    return $stmt->fetchAll();
  }
  protected function addData($user_id, $title, $description)
  {
    $sql = "INSERT INTO $this->tableName (user_id, title, description, created_at) VALUES (:user_id, :title, :description, NOW());";
    $stmt = \Db::connect()->prepare($sql);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":description", $description);
    $stmt->execute();
  }
  protected function deleteData($id)
  {
    $sql = "DELETE FROM $this->tableName WHERE article_id = {$id}";
    $stmt = \Db::connect()->query($sql);
    return $stmt->fetchAll();
  }
}
