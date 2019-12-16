<?php
   require('../global/database.php');
   session_start();
?>

<!DOCTYPE html>
<html>
  <head>

     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Sign In</title>
    <!--<link rel="stylesheet" type="text/css" href="style.css">-->
  </head>
  <body>
    <h1>Sign In</h1>
    <form action="../global/crud.php" method="post"> 
      <div>
        <span class="label">email: </span>
        <input type="text" name="email" value="">
      </div>
      <div>
        <span class="label">password: </span>
        <input type="password" name="password" value="">
      </div>
      <div>
        <input type="submit" name="login" value="Submit">
      </div>
    </form>
  </body>
</html>


 <!--action="?PHP $_SERVER['PHP_SELF'] -->