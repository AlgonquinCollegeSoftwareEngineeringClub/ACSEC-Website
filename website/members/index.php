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
    <!-- Container fluid in this case just adds a bit of padding so the text is not against the edges.. -->
    <div class="container-fluid">
      <h1>This page is under construction</h1>
    </div>
    <?php echoSignInModal(); ?>
    <?php echoBootstrapScripts(); ?>
  </body>
</html>
