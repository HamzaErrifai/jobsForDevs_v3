<?php
$title = " - " . $results["title"];
\controllers\Article::show($results);
?>
<script>
  $(".hta").first().addClass("text-break");
</script>