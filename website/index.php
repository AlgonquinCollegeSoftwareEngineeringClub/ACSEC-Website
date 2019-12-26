<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
    <title>ACSEC</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>
  <body>
<?php
    if (@$_GET['status'] == "loggedin" && isset($_SESSION['username']))
        echo '<div class="alert alert-success">Successfully logged in.</div>';
    else if (@$_GET['status'] == "deniedpermission")
        echo '<div class="alert alert-danger">You do not have permission to access that page.</div>';
?>
    <p>
      Welcome to the Algonquin College Software Engineering Club's website.
    </p>
    <div>
      <p>
        Our meet-up schedule is as follows:
      </p>
      <ul>
        <li>No meetups scheduled until school begins again.</li>
        <!--
        <li>F109 - Tuesday from 11:30am to 1:00pm.</li>
        <li>CA202 - Wednesday from 10:00am to 12:00pm.</li>
        -->
      </ul>
    </div>
    <p><a href="projects/">View our projects.</a></p>
    <p><a href="challenges/">View challenges.</a></p>
    <p>
      Contact us at: <a href="mailto:contact@acsec.ca">contact@acsec.ca</a>.
    </p>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
