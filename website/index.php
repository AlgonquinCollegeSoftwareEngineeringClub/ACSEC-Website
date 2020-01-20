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
    <!-- Container fluid in this case just adds a bit of padding so the text is not against the edges.. -->
    <div class="container-fluid">
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

          <li>F109 - Mondays from 12:00pm to 2:00pm.</li>

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
    </div>
    <?php echoSignInModal(true); ?>
    <?php echoBootstrapScripts(); ?>
  </body>
</html>
