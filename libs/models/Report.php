<?php

namespace models;

class Report
{
  protected $tableName = "report";

  protected function addData($userId, $title, $description)
  {
    try {
      $sql = "INSERT INTO $this->tableName (user_id, title, description, created_at) VALUES (:user_id, :title, :description, NOW());";
      $stmt = \Db::connect()->prepare($sql);
      $stmt->bindParam(":user_id", $userId);
      $stmt->bindParam(":title", $title);
      $stmt->bindParam(":description", $description);

      echo $stmt->execute();
      return true;
    } catch (\PDOException $e) {
      return false;
    }
  }
}
