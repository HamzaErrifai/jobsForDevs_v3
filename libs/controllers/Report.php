<?php

namespace controllers;

class Report extends \models\Report
{

  public function add($userId, $title, $description)
  {
    return $this->addData($userId, $title, $description);
  }
}
