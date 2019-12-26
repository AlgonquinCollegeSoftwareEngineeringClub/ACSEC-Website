<?php

require "../global/database.php";
require "../global/bootstrap.php";
require '../global/banner.php';

session_start();

// Ensure only admins can access this page.
if (!isset($_SESSION['MemberId']) || $_SESSION['Email'] !== "jess0076@algonquinlive.com") {
    header("Location:../index.php?status=deniedpermission");
    exit;
}

?>

<html>
  <head>
    <?php echoBootstrapStyle(); ?>
    <title>Add Key</title>
    <link rel="stylesheet" type="text/css" href="addchallenge.css">
  </head>
  <body>
    <?php echoBanner(); ?>
    <h1>Add Key</h1>
    <hr>
<?php
    if (@$_GET['status'] == "added")
        echo '<div class="alert alert-success">The key was added.</div>';
    else if (@$_GET['status'] == "alreadyexists")
        echo '<div class="alert alert-danger">That key already exists.</div>';
    else if (@$_GET['status'] == "blank")
        echo '<div class="alert alert-danger">You cannot add a blank key.</div>';
?>
    <form action="../global/crud.php" method="post">
      <div>
        <label for="key">Key</label>
        <input type="text" name="key" id="key" value="">
      </div>
      <input type="submit" name="addkey" value="Submit">
    </form>
    <?php echoBootstrapScripts(); ?>
  </body>
</html>
