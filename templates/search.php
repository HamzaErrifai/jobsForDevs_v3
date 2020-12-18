<div class="searchHero bg-secondary shadow-sm mb-3">
  <div class="descWrap">
    <div class="what form-control" for="description">What</div>
    <div class="where form-control" for="location">Where</div>
  </div>
  <form class="searchPanel" method="GET" action="">
    <input type="text" name="desc" class="form-control whatIn" id="desc" placeholder="Keywords" value="<?= $_GET["desc"] ?>" required>
    <input type="text" name="location" class="form-control whereIn" id="location" placeholder="City, Zip Code..." value="<?= $_GET["location"] ?>">
    <div class="searchBtn">
      <button class="btn btn-danger">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
          <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
        </svg>
      </button>
    </div>
  </form>
</div>


<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
$nextUrl  = "?desc={$_GET['desc']}&location={$_GET['location']}&page=";

\controllers\Search::pagination($page, count($results), $nextUrl);
echo "<div class='container'>";
echo "<h2 class='mb-5'>Results for '<span class='ticket'>" . $_GET["desc"] . "</span>':</h2>";
\controllers\Search::show($results);
echo "</div>";
\controllers\Search::pagination($page, count($results), $nextUrl);
?>