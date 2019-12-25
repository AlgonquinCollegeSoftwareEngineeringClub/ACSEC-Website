<?php

require "../global/database.php";

session_start();

// Ensure only admins can access this page.
if (!isset($_SESSION['username']) || $_SESSION['username'] !== "jess0076@algonquinlive.com") {
    header("Location:../index.php?status=deniedpermission");
    exit;
}

if (isset($_POST['submit'])) {
    $db = Database::getConnection();

    $key = $_POST['key'];
    if ($key !== '') {
        try {
            $query = $db->prepare('INSERT INTO AccountKey(TheKey) VALUES (?)');
            $query->execute([ $key ]);

            echo "The key <b>" . $key . "</b> was added.";
        }
        catch (PDOException $e) {
            echo "The key <b>" . $key . "</b> already exists!";
        }
    }
    else {
        echo "Cannot add a blank key!";
    }
}
else {

?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="addchallenge.css">
  </head>
  <body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div>
        <label for="key">Key</label>
        <input type="text" name="key" id="key" value="">
      </div>
      <input type="submit" name="submit" value="Submit">
    </form>
  </body>
</html>

<?php

}

?>
