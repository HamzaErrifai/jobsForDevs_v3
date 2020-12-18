<?php
$search = new \controllers\Search();
$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
$nextUrl = "?act=allarticles&page=";

$results = $search->start("", "", $page);
echo '<div class="display-3 text-center bg-success text-white shadow-sm">All Offers</div>';
echo "<center class='mt-3 text-left'>";
\controllers\Search::pagination($page, count($results), $nextUrl);
\controllers\Search::show($results);
\controllers\Search::pagination($page, count($results), $nextUrl);

echo "</center>";
