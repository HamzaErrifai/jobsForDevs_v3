<?php

function render(string $path, array $vars = [])
{
  extract($vars);
  ob_start();
  require("templates/" . $path . ".php");
  $pageContent = ob_get_clean();
  require("templates/layout.php");
}

function redirect(string $url)
{
  header("Location: $url");
  exit();
}
