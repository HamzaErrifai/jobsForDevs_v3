<?php
$str = "<h1> hi> </h1> <a href='#'>hh</a>";

$allowedTags = ["<a>", "<br>", "<h1>", "<h2>", "<h3>", "<h4>", "<h50>", "<h6>", "<strong>", "small"];
echo strip_tags($str, $allowedTags);
