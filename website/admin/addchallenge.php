<?php

require "../global/database.php";
require '../global/bootstrap.php';
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
    <title>Add Challenge</title>
    <link rel="stylesheet" type="text/css" href="addchallenge.css">
  </head>
  <body>
    <?php echoBanner(); ?>
    <h1>Add Key</h1>
    <hr>
<?php
    if (@$_GET['status'] == "added")
        echo '<div class="alert alert-success">The challenge was added.</div>';
    else if (@$_GET['status'] == "failed")
        echo '<div class="alert alert-danger">The challenge could not be added.</div>';
?>
    <form action="../global/crud.php" method="post">
      <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="">
      </div>
      <div>
        <label for="date">Date to post:</label>
        <input type="date" name="postdate" id="date" value="">
      </div>
      <div>
        <label for="difficulty">Difficulty:</label>
        <select name="difficulty" id="difficulty">
          <option value="1">Easy</option>
          <option value="2">Medium</option>
          <option value="3">Hard</option>
        </select>
      </div>
      <div>
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="20" cols="60" value=""></textarea>
      </div>
      <div>
        <label for="example">Example:</label>
        <textarea name="example" id="example" rows="20" cols="60" value=""></textarea>
      </div>
      <input type="submit" name="addchallenge" value="Submit">
    </form>
    <?php echoBootstrapScripts(); ?>
  </body>
</html>
