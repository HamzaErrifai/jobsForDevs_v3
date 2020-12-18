<?php

namespace controllers;

class Search extends \models\Search
{
  public function start($desc = "", $location = "", $pageno = "1"): array
  {
    //Search in api and db and join the two tables
    $respDb = [];
    // if (empty($desc)) {
    //   $article = new Article();
    //   $respDb = $article->getLatest();
    // }
    $respApi = $this->getDataFromApi($desc, $location, $pageno);

    return array_merge($respDb, $respApi);
  }

  public function onePost($id): array
  {
    return $this->getPostFromApi($id);
  }

  public static function show($companies)
  {
    if (!empty($companies)) {
      foreach ($companies as $company) {
        echo '<div class="container card mb-3 animate__animated animate__fadeIn">';
        echo '<a class="text-dark text-decoration-none" href="?article=' . $company["id"] . '">';
        echo '  <div class="row no-gutters">';
        echo '    <div class="col-md-4 img-cont" style="background-image: url(\'' . ($company["company_logo"] ? $company["company_logo"] : "templates/img/nologo.png") . '\')"></div>';
        echo '    <div class="col-md-8">';
        echo '      <div class="card-body">';
        echo '        <h5 class="card-title">' . $company["title"] . '</h5>';
        echo '        <p class="card-text font-weight-normal text-justify">' . substr(strip_tags($company["description"]), 0, 300) . '...</p>';
        echo '        <p class="card-text"><small class="text-muted">' . $company["created_at"] . '</small></p>';
        echo '      </div>';
        echo '    </div>';
        echo '  </div>';
        echo '</a></div>';
      }
    } else {
      \controllers\Http::redirect("?act=notfound");
    }
  }

  public static function pagination($page = 1, $countRes, $nextUrl)
  {
    $total_pages = $page;

    if ($countRes < 50)
      $total_pages = $page;
    else
      $total_pages++;

    echo '   <nav aria-label="Page navigation" class="bg-transparent">';
    echo ' <ul class="pagination justify-content-center">';
    echo '   <li class="page-item ' . (($page <= 1) ? "disabled" : '') . '">';

    echo '     <a class="page-link" href="' . (($page <= 1) ? "#" : $nextUrl . ($page - 1)) . '">';
    echo '       <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">';
    echo '         <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />';
    echo '       </svg>';
    echo '     </a>';
    echo '   </li>';

    for ($i = 1; $i <= $total_pages; $i++) {
      echo '<li class="page-item ' . (($page == $i) ? "active" : " ") . '"><a class="page-link" href="' . ($nextUrl . $i . '">' . $i) . '</a></li>';
    }


    echo '   <li class="page-item ' . (($page >= $total_pages) ? "disabled" : '') . '">';
    echo '     <a class="page-link" href="' . (($page >= $total_pages) ? "#" : $nextUrl . ($page + 1)) . '">';
    echo '       <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">';
    echo '         <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />';
    echo '       </svg>';
    echo '     </a>';
    echo '   </li>';
    echo ' </ul>';
    echo '</nav>';
  }
}
