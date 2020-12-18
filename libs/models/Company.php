<?php

namespace models;

abstract class Company extends Model
{
  protected $tableName = "company";

  protected function addData($userId, $compName, $compEmail, $compUrl, $compLoc, $imgSrc)
  {
    try {
      $sql = "INSERT INTO $this->tableName (user_id, company_name, company_email, company_url, company_location, img_src, created_at) VALUES (:user_id,:company_name, :company_email, :company_url, :company_location, :img_src, NOW());";
      $stmt = \Db::connect()->prepare($sql);
      $stmt->bindParam(":user_id", $userId);
      $stmt->bindParam(":company_name", $compName);
      $stmt->bindParam(":company_email", $compEmail);
      $stmt->bindParam(":company_url", $compUrl);
      $stmt->bindParam(":company_location", $compLoc);
      $stmt->bindParam(":img_src", $imgSrc);
      $stmt->execute();
      return true;
    } catch (\PDOException $e) {
      return false;
    }
  }
}
