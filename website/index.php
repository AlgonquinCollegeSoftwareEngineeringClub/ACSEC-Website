<?php session_start(); ?>
<?php require 'global/bootstrap.php'; ?>

<!DOCTYPE html>
<html>
  <head>
    <?php echoBootstrapStyle(); ?>
    <title>ACSEC</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
<?php
    if (@$_GET['status'] == "loggedin" && isset($_SESSION['MemberId']))
        echo '<div class="alert alert-success">Successfully signed in.</div>';
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
    <?php echoBootstrapScripts(); ?>
  </body>
</html>
