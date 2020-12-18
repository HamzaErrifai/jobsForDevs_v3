<?php
$userd = new \controllers\User();

//Check user infos: if a user is visitng or seeing his own profil

if (isset($_GET["id"])) {
  $_GET["id"] = htmlspecialchars($_GET["id"]);
  if ($userR = $userd->getBy(intval($_GET["id"])));
  else
    \controllers\Http::redirect("?act=notfound");
  extract($userR);
} else if (isset($_SESSION["user"]) && empty($userR)) {
  extract($_SESSION["user"]);
} else {
  \controllers\Http::redirect($root);
}

if (isset($is_employer)) {
  if ($is_employer) {
    $company = new \controllers\Company();
    $_SESSION["company"] = (!empty($company->get($user_id))) ? $company->get($user_id) : "";
    extract($_SESSION["company"], EXTR_PREFIX_SAME, "company");
  }
}
$articles = new \controllers\Article();
//DELETE A POST
if (array_key_exists('delete', $_POST)) {
  // print_r($_SESSION["articles"]);
  $articles->deleteA($_POST["delete"]);
}
$_SESSION["articles"] = $articles->getAll($user_id);
?>

<div class="bg-white shadow-sm rounded-bottom user-div">
  <div class="container">
    <!-- User Description -->
    <div class="p-2">
      <div class="user-container row">
        <div class="user-img col-sm-3">
          <img class="rounded" src="<?= $img_src ?>" width="150px" height="150px" alt="">
        </div>

        <div class="user-desc col-sm-8">
          <div class="user-line"><?= ucfirst($first_name) . " " . ucfirst($last_name) ?></div>
          <div class="user-email">
            <a class="a-custom" href="mailto:<?= $email ?>"><?= $email ?></a>
          </div>
        </div>
      </div>

    </div>
    <?php if (isset($is_employer) && $is_employer) : ?>
      <hr width="70%">
      <!-- Company Description -->
      <div class="p-2">
        <div class="user-container row">

          <div class="user-img col-sm-3">
            <img class="rounded" src="<?= $company_img_src ?>" width="150px" height="150px" alt="">
          </div>

          <div class="user-desc col-sm-8">
            <div class="user-line"><?= ucfirst($company_name) ?></div>
            <div class="user-email">
              <a class="a-custom" href="mailto:<?= $company_email ?>"><?= $company_email ?></a>
            </div>
            <div class="user-url">
              <a class="a-custom" href="https://<?= $company_url ?>" target="_blank"><?= $company_url ?></a>
            </div>
            <div class="user-line"><?= ucfirst($company_location) ?></div>
          </div>
        </div>
      </div>
    <?php endif ?>
  </div>
</div>

<div class="container p-2 bg-white shadow-sm rounded-lg">

  <button type="button" class="btn btn-info btn-lg btn-block" id="create">Create a post</button>

</div>
<div class="container pt-2 pb-2 ">
  <?php if (empty($_SESSION["articles"])) :
  ?>
    <div class="text-center">
      <img src="templates/img/noPost.svg" width="300px" height="250px" alt="">
      <h3 class="text-muted">No posts</h3>
    </div>
</div>

<?php else : ?>
  <?php foreach ($_SESSION["articles"] as $article) :
  ?>
    <div class="container bg-white mb-2 shadow-sm rounded-lg p-3 text-justify">
      <div class="user-post">
        <div>
          <img src="<?= $img_src ?>" width="50px" height="50px" alt="">
          <span class="text-weight-bold ml-3"><?= ucfirst($first_name) . " " . ucfirst($last_name) ?></span>
        </div>
        <?php if (isset($_SESSION["user"]) && ($_SESSION["user"]["user_id"] == $user_id)) : ?>
          <div class="dropdown">
            <button class="c text-muted btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">options</button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <form method="post">
                <button type="submit" class="btn btn-block" name="delete" value="<?= $article["article_id"] ?>">Delete</button>
                <button type="submit" class="btn btn-block" disabled name="report" value="<?= $article["article_id"] ?>">Report</button>
              </form>
            </div>
          </div>
        <?php endif ?>
      </div>
      <hr>
      <h2 class="text-weight-bold"><?= $article["title"] ?></h2>
      <div class="p-2">
        <?= $article["description"] ?>
      </div>
      <div class="row">
        <div class="col text-right text-muted"><?= $article["created_at"] ?></div>
      </div>
    </div>

  <?php endforeach ?>
<?php endif ?>
</div>

<script>
  $("#create").click(() => {
    window.location.replace("?act=createArticle")
  });
</script>