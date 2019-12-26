<?php require 'registerstatus.php'; ?>
<?php require '../global/bootstrap.php'; ?>
<?php require '../global/banner.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <?php echoBootstrapStyle(); ?>
    <title>Register</title>
  </head>
  <body>
    <?php echoBanner(); ?>
    <h1>Register</h1>
    <hr>
    <?php handleRegisterReturnStatus(); ?>
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
        <p>If you're a member of the Software Engineering Club and need a key, message Corvus#4166 on discord.</p>
        <p>Already Have an account? <a href="../signin/">Go to the sign in page.</a></p>
    </div>
    <?php echoBootstrapScripts(); ?>
  </body>
</html>
