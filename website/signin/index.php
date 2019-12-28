<?php

require_once '../global/database.php';
require_once '../global/bootstrap.php';
require_once '../global/banner.php';
require_once '../global/session.php';

startSessionFromCookie();

?>

<!DOCTYPE html>
<html>
  <head>
    <?php echoBootstrapStyle(); ?>
    <title>Sign In</title>
  </head>
  <body>
    <?php echoBanner(); ?>
    <h1>Sign In</h1>
    <hr>
<?php
    if (@$_GET['status'] == "invalidcredentials")
        echo '<div class="alert alert-danger">Incorrect email or password.</div>';
    else if (@$_GET['status'] == "accountcreated")
        echo '<div class="alert alert-success">Account created.</div>';
    else if (@$_GET['status'] == "loggedout")
        echo '<div class="alert alert-success">You have successfully logged out.</div>';
?>
    <form class="container" action="../global/crud.php" method="post">
      <div class="form-group">
        <label>email</label>
        <input type="text" class="form-control" name="email" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Enter Password">
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="rememberme" id="rememberme" value="">
        <label class="form-check-label" for="rememberme">Keep me signed in.</label>
      </div>

      <input type="submit" class="btn btn-primary" name="login" value="Submit">
    </form>

    <div>
        <p>Don't have an account yet? <a href="../register/">Go to the registration page.</a></p>
    </div>
    <?php echoBootstrapScripts(); ?>
  </body>
</html>


 <!--action="?PHP $_SERVER['PHP_SELF'] -->
