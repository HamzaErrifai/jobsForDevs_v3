<?php

namespace controllers;

class Article extends \models\Article
{
  public function getAll($userId)
  {
    return $this->getAllData("user_id", $userId);
  }

  public function getLatest()
  {
    return $this->getAllDataByOrder("ORDER BY articles.created_at DESC");
  }

  public function add($user_id, $title, $description)
  {
    return $this->addData($user_id, $title, $description);
  }
  public function deleteA($article_id)
  {
    return $this->deleteData($article_id);
  }

  public static function show($post)
  {
    echo '<div class="container p-3 bg-white showMain shadow">';
    echo '<div>';
    echo '<img id="showLogo" src ="' . ($post["company_logo"] ? $post["company_logo"] : "templates/img/nologo.png") . '"></img>';
    echo '<span class="font-weight-bolder">' . $post["company"] . '</span>';
    echo '<p> <a class="font-italic" href="' . $post["company_url"] . '" target="_blank">' . $post["company_url"] . '</a></p>';
    echo '<p>Location: <span class="font-italic">' . $post["location"] . '</span></p>';
    echo '<p>Full Time: <span class="font-italic">' . (($post["type"] == "Full Time") ? "Yes" : "No") . '</span></p>';
    echo '<small class="text-muted">Created at: ' . $post["created_at"] . '</small>';
    echo '</div><hr>';

    echo '<div class="p-3">';
    echo '<h3 class="ticket">';
    echo $post["title"];
    echo '</h3>';
    echo '<p class="text-justify">';
    echo $post["description"];
    echo '</p>';
    echo '<p class="hta" >' . strip_tags($post["how_to_apply"], "<a>") . '</p>';
    echo '</div>';
    echo '</div>';
  }
}
