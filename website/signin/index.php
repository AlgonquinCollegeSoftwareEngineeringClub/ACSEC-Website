<?php
require('../global/database.php');
session_start();
?>

<!DOCTYPE html>
<html>
  <head>

     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Sign In</title>
    <!--<link rel="stylesheet" type="text/css" href="style.css">-->
  </head>
  <body>
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

      <input type="submit" class="btn btn-primary" name="login" value="Submit">
    </form>

    <div>
        <p>Don't have an account yet? <a href="register.php">Go to the registration page.</a></p>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>


 <!--action="?PHP $_SERVER['PHP_SELF'] -->