<div id="notfound" class="one-content">
  <img src="templates/img/notfound.svg" alt="">
  <h2 class="text-muted">
    THE PAGE YOU REQUESTED DOES NOT EXIST
  </h2>
  <a href="<?= $root ?>" class="btn btn-success">&#8592; Home Page</a>

</div>

<script>
  setTimeout(function() {
    window.location.replace("<?= $root ?>");
  }, 3000);
</script>