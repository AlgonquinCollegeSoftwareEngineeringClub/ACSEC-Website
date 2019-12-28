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
    <h1>This page is under construction</h1>

    <!-- TODO: Should show member's name (gathered from GET id) and their submissions. -->

    <?php echoSignInModal(); ?>
    <?php echoBootstrapScripts(); ?>
  </body>
</html>
