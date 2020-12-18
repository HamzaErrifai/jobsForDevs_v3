<?php
require_once("../lib/funcs.php");
$respArray = getJobsFromApi("");
// echo json_encode($respArray);

function last3Offers($companies)
{
  for ($i = 0; $i < 3; $i++) {
    echo '<div class="card animate__animated animate__fadeIn hoverMe"><a class="text-dark text-decoration-none" href="article/?k=' . $companies[$i]["id"] . '">';
    echo '<img class="card-img-top" src="' . $companies[$i]["company_logo"] . '" alt="' . $companies[$i]["company"] . '">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title font-weight-bolder">' . $companies[$i]["title"] . '</h5>';
    echo '<p class="card-text">' . substr($companies[$i]["description"], 0, 306) . '...</p>';
    echo '<p class="card-text"><small class="text-muted">' . $companies[$i]["created_at"] . '</small></p>';
    echo '</div>';
    echo '</a></div>';
  }
}

last3Offers($respArray);
exit;
