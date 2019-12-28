<?php

require_once '../global/banner.php';
require_once '../global/bootstrap.php';
require_once '../global/session.php';

startSessionFromCookie();

?>

<html>
  <head>
    <?php echoBootstrapStyle(); ?>
    <!-- TODO: Should say the member's name here -->
    <title>Member</title>
  </head>
  <body>
    <?php echoBanner(); ?>
    <!-- Container fluid in this case just adds a bit of padding so the text is not against the edges.. -->
    <div class="container-fluid">
      <h1>This page is under construction</h1>

      <!-- TODO: Should show member's name (gathered from GET id) and their submissions. -->

    </div>
    <?php echoSignInModal(); ?>
    <?php echoBootstrapScripts(); ?>
  </body>
</html>
