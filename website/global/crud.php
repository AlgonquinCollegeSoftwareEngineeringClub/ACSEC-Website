<?php
// TODO: need to add the registration key logic!
require('database.php');
session_start();

$db = Database::getConnection();

if (isset($_POST['register'])) {
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $accountKey = $_POST['Key'];

    // TODO: If there is no valid account key given, do not create account.
    // Ensure given account key exists and is unclaimed.
    // $keyExists = ;
    // $keyIsUnclaimed = ;
    // if ($keyExists && $keyIsUnclaimed) {
    //
    // }
    // else if (!$keyExists) {
    //     header("Location:../signin/register.php?status=keydoesntexist");
    // }
    // elseif (!$keyIsUnclaimed) {
    //     header("Location:../signin/register.php?status=keyalreadyclaimed");
    // }

    if (strlen($password) >= 1 && strlen($password) <= 60) {
        $pass_ok = True;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    if ($pass_ok) {
        $insert=$db->prepare("INSERT INTO Member SET
            FirstName=:firstName,
            LastName=:lastName,
            Email=:email,
            Password=:password
        ");

        $check=$insert->execute(array(
            'firstName'=>$firstName,
            'lastName'=>$lastName,
            'email'=>$email,
            'password'=>$password
        ));

        if ($check) {
            header("Location:../signin/register.php?status=ok");
        }
        else {
            header("Location:../signin/register.php?status=no");
        }
    }
    else {
        header("Location:../signin/register.php?status=no");
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
        }
        else {
            $error = "Your Login Name or Password is invalid!";
            echo $error;
        }
    }
}
?>
