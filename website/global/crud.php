<?php
require('database.php');
session_start();

$db = Database::getConnection();

if (isset($_POST['register'])) {
    $firstName = trim($_POST['FirstName']);
    $lastName = trim($_POST['LastName']);
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $accountKey = $_POST['Key'];

    // Ensure the given names are not blank.
    if ($firstName == '') {
        header("Location:../signin/register.php?status=blankname");
        exit;
    }
    else if ($lastName == '') {
        header("Location:../signin/register.php?status=blanklastname");
        exit;
    }

    // Check the given key to make sure it exists in the database.
    $keyId = -1;
    $query = $db->prepare('SELECT AccountKeyId FROM AccountKey WHERE TheKey = ?');
    $query->execute([$accountKey]);
    if ($query->rowCount() > 0) {
        $keyExists = true;
        $keyId = $query->fetch()['AccountKeyId'];
    }
    else {
        $keyExists = false;
    }

    // Check whether the given key has already been claimed.
    $query = $db->prepare('SELECT MemberId FROM Member WHERE AccountKeyId = ?');
    $query->execute([$keyId]);
    if ($query->rowCount() > 0) {
        $keyIsUnclaimed = false;
    }
    else {
        $keyIsUnclaimed = true;
    }

    if (!$keyExists) {
        header("Location:../signin/register.php?status=keydoesntexist");
        exit;
    }
    else if (!$keyIsUnclaimed) {
        header("Location:../signin/register.php?status=keyalreadyclaimed");
        exit;
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location:../signin/register.php?status=invalidemail");
        exit;
    }

    if (strlen($password) >= 1 && strlen($password) <= 60) {
        $pass_ok = True;
    }

    if ($pass_ok) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $insert=$db->prepare("INSERT INTO Member(FirstName, LastName, Email, Password, AccountKeyId) VALUES (?, ?, ?, ?, ?)");
        $check=$insert->execute([ $firstName, $lastName, $email, $password, $keyId ]);

        if ($check) {
            header("Location:../signin/login.php?status=accountcreated");
            exit;
        }
        else {
            header("Location:../signin/register.php?status=createfailed");
            exit;
        }
    }
    else {
        header("Location:../signin/register.php?status=passwordwronglength");
        exit;
    }
}
if (isset($_POST['login'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query1 = $db->prepare('SELECT Password, MemberId FROM Member WHERE Email = ?');
        $query1->execute([$email]);
        $count = $query1->rowCount();
        $row = $query1->fetch();
        $password_h = $row['Password'];

        // If result matched $myusername and $mypassword, table row must be 1 row
        if ($count == 1 && password_verify($password, $password_h)) {
            $_SESSION['MemberId'] = $row['MemberId'];
            $_SESSION['Email'] = $email;

            header("Location:../index.php?status=loggedin");
            exit;
        }
        else {
            header("Location:../signin/login.php?status=invalidcredentials");
            exit;
        }
    }
}
?>
