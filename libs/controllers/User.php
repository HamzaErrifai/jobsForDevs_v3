<?php

namespace controllers;

class User extends \models\User
{
  public function get($email, $hashpwd): array
  {
    if ($this->isUser($email, $hashpwd))
      return $this->getData("email", $email);
    else
      return [];
  }

  public function add(string $fname, string $lname, string $email, string $pwd, string $imgSrc, int $isEmployer): bool
  {
    // $structure = "D:/apps/xampp/htdocs/jobsForDevs_v3/server/profils/$email/pictures";
    // if (!mkdir($structure, 0777, true)) {
    //   die('Echec lors de la création des répertoires...');
    // }
    $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);
    return $this->addData(strtolower($fname), strtolower($lname), $email, $hashPwd, $imgSrc, $isEmployer);
  }

  public function insertP($id,  $itemName, $item): bool
  {
    return $this->insert($id, $itemName, $item);
  }

  public function getBy($id)
  {
    return $this->getDataById($id);
  }
  public static function logout()
  {
    session_unset();
    session_destroy();
    Http::redirect("?act=login");
  }
}
