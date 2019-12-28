<?php

require_once 'global/bootstrap.php';
require_once 'global/banner.php';
require_once 'global/session.php';

startSessionFromCookie();

?>

<!DOCTYPE html>
<html>
  <head>
    <?php echoBootstrapStyle(); ?>
    <title>ACSEC</title>
  </head>
  <body>
    <?php echoBanner("main", true); ?>
    <h1>Welcome</h1>
    <hr>
<?php
    if (@$_GET['status'] == "loggedin" && isset($_SESSION['MemberId']))
        echo '<div class="alert alert-success">Successfully signed in.</div>';
    else if (@$_GET['status'] == "deniedpermission")
        echo '<div class="alert alert-danger">You do not have permission to access that page.</div>';
?>
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
    <p>
      Join the Discord server if you haven't already: <a href="https://discord.gg/pK7vEfs">https://discord.gg/pK7vEfs</a>
    </p>
    <?php echoSignInModal(true); ?>
    <?php echoBootstrapScripts(); ?>
  </body>
</html>
