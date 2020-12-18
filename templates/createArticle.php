<?php
if (isset($_SESSION["user"])) {
  if (isset($_SESSION["user"]["email_verifyed"]) && $_SESSION["user"]["email_verifyed"] == 1) {
    $allowedTags = ["<a>", "<br>", "<h2>", "<h3>", "<h4>", "<h5>", "<h6>", "<strong>", "<small>"];
    if (isset($_POST["submit"])) {
      $_POST["title"] = (isset($_POST["title"])) ? strip_tags(trim($_POST["title"]), $allowedTags) : "";
      $_POST["desc"] = (isset($_POST["desc"])) ? strip_tags(trim($_POST["desc"]), $allowedTags) : "";
      $article = new \controllers\Article();
      if (!empty($_POST["title"]) && !empty($_POST["desc"]))
        $article->add($_SESSION["user"]["user_id"], $_POST["title"], $_POST["desc"]);
      \controllers\Http::redirect("?act=profil");
    }
  } else {
    \controllers\Http::redirect("?act=verifyEmail");
  }
} else {
  \controllers\Http::redirect("?act=profil");
}
?>
<div class="container one-content">

  <h1>CREATE ARTICLE</h1>

  <form action='?act=createarticle' method="post">
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="" placeholder="Enter a title">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="desc" id="" class="form-control" cols="100" rows="10" placeholder="You can use html too"></textarea>
    </div>
    <input type="submit" name="submit" class="btn btn-success" value="Post">
    <a href="?act=profil" class="btn">Cancel</a>
  </form>

</div>