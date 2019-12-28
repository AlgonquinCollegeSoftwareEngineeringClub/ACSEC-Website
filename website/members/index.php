<?php

require_once '../global/banner.php';
require_once '../global/bootstrap.php';
require_once '../global/session.php';

startSessionFromCookie();

?>

<html>
  <head>
    <?php echoBootstrapStyle(); ?>
    <title>Members</title>
  </head>
  <body>
    <?php echoBanner("members"); ?>
    <h1>This page is under construction</h1>
    <?php echoBootstrapScripts(); ?>
  </body>
</html>
