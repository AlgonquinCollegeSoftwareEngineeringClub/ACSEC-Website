<?php require('registerstatus.php'); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Register page!</title>
  </head>
  <h1>Register</h1>
  <hr>
  <?php handleRegisterReturnStatus(); ?>
  <body>
    <form class="container" action="../global/crud.php" method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">First Name</label>
        <input type="text" class="form-control"  name="FirstName" placeholder="Enter First Name">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Last Name</label>
        <input type="text" class="form-control"  name="LastName" placeholder="Enter Last Name">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">email</label>
        <input type="text" class="form-control"  name="Email" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Password</label>
        <input type="password" class="form-control"  name="Password" placeholder="Enter Password">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Registration key</label>
        <input type="text" class="form-control"  name="Key" placeholder="Enter Key">
      </div>

      <button type="submit" name="register" class="btn btn-primary">Submit</button>
    </form>

    <div>
        <p>Already Have an account? <a href="login.php">Go to the signin page.</a></p>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
