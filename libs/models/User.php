<?php

namespace models;

use Exception;

class User extends Model
{
  protected $tableName = "users";

  protected function isUser($email, $pwd): bool
  {
    $sql = "SELECT pwd FROM $this->tableName WHERE email = ?";
    $stmt = \Db::connect()->prepare($sql);
    $stmt->execute([$email]);
    $resp = $stmt->fetch();
    return password_verify($pwd, $resp["pwd"]);
  }

  protected function addData($fname, $lname, $email, $pwd, $imgSrc, $isEmployer)
  {
    try {
      $sql = "INSERT INTO $this->tableName (first_name, last_name, email, pwd, img_src, is_employer, created_at) VALUES (:first_name, :last_name, :email, :pwd, :img_src, :is_employer, NOW());";
      $stmt = \Db::connect()->prepare($sql);
      $stmt->bindParam(":first_name", $fname);
      $stmt->bindParam(":last_name", $lname);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":pwd", $pwd);
      $stmt->bindParam(":img_src", $imgSrc);
      $stmt->bindParam(":is_employer", $isEmployer);
      echo $stmt->execute();
      return true;
    } catch (\PDOException $e) {
      return false;
    }
  }

  protected function getDataById($pValue)
  {
    try {

      $sql = "SELECT * FROM $this->tableName WHERE user_id = $pValue";
      $stmt = \Db::connect()->query($sql);
      $stmt->execute();
      return $stmt->fetch();
    } catch (\PDOException $e) {
      die($e->getMessage());
    }
  }
}
