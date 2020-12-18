<?php
if (isset($_SESSION["user"]) && $_SESSION["user"]["email_verifyed"] == 0) {
  if (empty($_SESSION["gToken"]))
    \controllers\Http::verifyEmail($_SESSION["user"]["email"]);
  if (isset($_POST["passcode"])) {
    $_POST["passcode"] = htmlspecialchars($_POST["passcode"]);

    if (\controllers\Http::checkToken($_POST["passcode"])) {
      $user = new \controllers\User();
      $user->insertP($_SESSION["user"]["user_id"], "email_verifyed", 1);
      unset($_SESSION["passcode"]);
      $_SESSION["user"] = $user->getBy($_SESSION["user"]["user_id"]);
      \controllers\Http::redirect("?act=profil");
    } else {
      echo $_POST["passcode"] . "<br>";
      echo $_SESSION["gToken"];
    }
  }
} else {
  \controllers\Http::redirect("?act=login");
}
?>

<div class="container">
  <h1 class="text-center">Verify Email</h1>
  <p for="input" class="text-center">Passcode sent to : <span class="ticket"><?= $_SESSION["user"]["email"] ?></span></p>
  <form action="" method="post" class="form-inline d-flex justify-content-center">
    <div class="form-group mb-2 text-center">
      <input type="text" class="form-control" id="msg" name="passcode" placeholder="Verify your email first">
    </div>
    <button type="submit" class="btn btn-info mb-2 mx-sm-3 mb-2">Check</button>
  </form>

</div>
<script>
  // setTimeout(function() {
  //   $("#msg").attr("placeholder", 'Passcode');
  // }, 2000);

  setTimeout(function() {
    $("#msg").attr("placeholder", 'Passcode');
  }, 2000);
</script>