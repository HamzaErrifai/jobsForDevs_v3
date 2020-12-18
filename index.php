<?php
session_start();
require_once("libs/autoload.php");
$root = "/jobsForDevs_v3/";
//The if the database is down the website will redirect to 404 page
$path = "mainpage";
$results = [];
$data = [];
$search = new \controllers\Search();


if (!empty($_GET["article"])) {
  $_GET["article"] = htmlspecialchars($_GET["article"]);
  $path = "article";
}

if (!empty($_GET["act"])) {
  $path = htmlspecialchars($_GET["act"]);
}

if (!empty($_GET["desc"])) {
  $_GET["desc"] = htmlspecialchars($_GET["desc"]);
  $_GET["location"] = htmlspecialchars($_GET["location"]);
  if (isset($_GET['page']))
    $_GET["page"] = htmlspecialchars($_GET["page"]);
  else
    $_GET["page"] = 1;

  $path = "search";
}


switch ($path) {
  case "mainpage":
    $results = $search->start();
    break;

  case "article":
    $results = $search->onePost($_GET["article"]);
    break;
  case "search":
    $results = $search->start(str_replace(" ", "-", trim($_GET["desc"])), str_replace(" ", "-", trim($_GET["location"])), $_GET["page"]);
    break;
  case $_GET["act"]:
    break;
  default:
    $path = "mainpage";
    break;
}
$path = strtolower($path);
$title = ($path == "mainpage") ? "" :  " - " . $path;
$data = compact("root", "title", "results");

\controllers\Http::render($path, $data);
