<?php
$articles = new \controllers\Article();
$_SESSION["articles"] = $articles->getLatest();
?>

<!-- HERO SECTION -->
<div id="hero">
  <div class="descWrap">
    <div class="what form-control" for="description">What</div>
    <div class="where form-control" for="location">Where</div>
  </div>

  <form id="searchBar" method="GET" action="">
    <input type="text" name="desc" class="form-control whatIn" id="desc" placeholder="Keywords" required>
    <input type="text" name="location" class="form-control whereIn" id="location" placeholder="City, Zip Code...">
    <div class="searchBtn">
      <button class="btn btn-danger">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
          <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
        </svg>
        Find Jobs
      </button>
    </div>
  </form>
</div>

<!-- Comanies of the day -->
<div class="jobOffers">
  <div class="background">
    <div class="container pt-2 pb-2 mb-2">
      <h3 class="ticket">Last offers</h3>
      <div class="card-deck" id="showRes">
        <?php for ($i = 0; $i < 3; $i++) : ?>
          <div class="card animate__animated animate__zoomInUp hoverMe"><a class="text-dark text-decoration-none" href="?article=<?= $results[$i]["id"] ?>">
              <div class="img-cont" style="background-image: url('<?= ($results[$i]["company_logo"]) ? $results[$i]["company_logo"] : $root . "/templates/img/nologo.png"; ?>');"></div>

              <div class="card-body">
                <h5 class="card-title font-weight-bolder"><?= $results[$i]["title"] ?></h5>
                <p class="card-text text-justify"><?= filter_var(substr($results[$i]["description"], 0, 306), FILTER_SANITIZE_STRING) ?>...</p>
                <p class="card-text"><small class="text-muted"><?= $results[$i]["created_at"] ?></small></p>
              </div>
            </a></div>
        <?php endfor ?>
      </div>
    </div>
    <div class="text-center">
      <a href="?act=allarticles" class="a-custom" style="font-size: 2em;">Show all offers</a>
    </div>
  </div>
</div>
<div class="lastposts">
  <div class="container">
    <h3 class="ticket">Last Posts</h3>
    <?php foreach ($_SESSION["articles"] as $article) :
    ?>
      <div class="container bg-white shadow-sm rounded-lg p-3 mb-2 text-justify animate__animated animate__fadeInUp">
        <div>
          <a class="a-custom" href='<?= "?act=profil&id=" . $article["user_id"] ?> '>

            <img src="<?= $article["img_src"] ?>" width="50px" height="50px" alt="">
            <span class="text-weight-bold ml-3"><?= ucfirst($article["first_name"]) . " " . ucfirst($article["last_name"]) ?></span>
          </a>
        </div>
        <hr>
        <div class="p-2">
          <h2 class="text-weight-bold"><?= $article["title"] ?></h2>
          <p>
            <?= $article["description"] ?>
          </p>
        </div>
        <div class="row">
          <div class="col text-right text-muted"><?= $article["created_at"] ?></div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>