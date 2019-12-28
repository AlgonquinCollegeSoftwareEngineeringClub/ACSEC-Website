<?php

require_once '../global/banner.php';
require_once '../global/bootstrap.php';
require_once '../global/session.php';

startSessionFromCookie();

?>

<html>
  <head>
    <?php echoBootstrapStyle(); ?>
    <title>Projects</title>
  </head>
  <body>
    <?php echoBanner("projects"); ?>
    <h1>This page is under construction</h1>
    <?php echoSignInModal(); ?>
    <?php echoBootstrapScripts(); ?>
  </body>
</html>
