<?php
require('database.php');
session_start();

$db = Database::getConnection();

if (isset($_POST['register'])) {
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $accountKey = $_POST['Key'];

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

    if (strlen($password) >= 1 && strlen($password) <= 60) {
        $pass_ok = True;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    if ($pass_ok) {
        $insert=$db->prepare("INSERT INTO Member SET
            FirstName=:firstName,
            LastName=:lastName,
            Email=:email,
            Password=:password,
            AccountKeyId=:keyId
        ");

        $check=$insert->execute(array(
            'firstName'=>$firstName,
            'lastName'=>$lastName,
            'email'=>$email,
            'password'=>$password,
            'keyId'=>$keyId
        ));

        if ($check) {
            header("Location:../signin/register.php?status=ok");
            exit;
        }
        else {
            header("Location:../signin/register.php?status=no");
            exit;
        }
    }
    else {
        header("Location:../signin/register.php?status=no");
        exit;
    }
}
if (isset($_POST['login'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form
        $username = $_POST['email'];
        $password = $_POST['password'];
        $query1 = $db->prepare('SELECT Password, MemberId FROM Member WHERE Email = ?');
        $query1->execute([$username]);
        $count = $query1->rowCount();
        $row = $query1->fetch();
        $password_h = $row['Password'];

        // If result matched $myusername and $mypassword, table row must be 1 row
        if ($count == 1 && password_verify($password, $password_h)) {
            $_SESSION['username'] = $username;

            header("Location: index.html");
            exit;
        }
        else {
            $error = "Your Login Name or Password is invalid!";
            echo $error;
        }
    }
}
?>
