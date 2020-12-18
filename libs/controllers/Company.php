<?php

namespace controllers;

class Company extends \models\Company
{

  public function get($userId)
  {
    if (!empty($this->getData("user_id", $userId)))
      return $this->getData("user_id", $userId);
    else
      return [];
  }

  public function add($userId, $compName, $compEmail, $compUrl, $compLoc, $imgSrc): bool
  {
    // $structure = "D:/apps/xampp/htdocs/jobsForDevs_v3/server/companies/$compName/pictures";
    // if (!mkdir($structure, 0777, true)) {
    //   die('Echec lors de la création des répertoires...');
    // }
    return $this->addData($userId, $compName, $compEmail, $compUrl, $compLoc, $imgSrc);
  }

  public function insertP($id,  $itemName, $item): bool
  {
    return $this->insert($id, $itemName, $item);
  }
}
