<?php

// NOTE: This page should only be accessible by admins.

require "../global/database.php";

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
