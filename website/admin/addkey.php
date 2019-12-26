<?php

require "../global/database.php";

session_start();

// Ensure only admins can access this page.
if (!isset($_SESSION['MemberId']) || $_SESSION['Email'] !== "jess0076@algonquinlive.com") {
    header("Location:../index.php?status=deniedpermission");
    exit;
}

?>

<html>
  <head>
    <title>Add Key</title>
    <link rel="stylesheet" type="text/css" href="addchallenge.css">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>
  <body>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
