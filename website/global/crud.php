<?php

require_once 'database.php';
require_once 'session.php';

startSessionFromCookie();

$db = Database::getConnection();

if (isset($_POST['register'])) {
    $firstName = trim($_POST['FirstName']);
    $lastName = trim($_POST['LastName']);
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $accountKey = $_POST['Key'];

    // Ensure the given names are not blank.
    if ($firstName == '') {
        header("Location:../register/?status=blankname");
        exit;
    }
    else if ($lastName == '') {
        header("Location:../register/?status=blanklastname");
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
        header("Location:../register/?status=keydoesntexist");
        exit;
    }
    else if (!$keyIsUnclaimed) {
        header("Location:../register/?status=keyalreadyclaimed");
        exit;
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location:../register/?status=invalidemail");
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
            header("Location:../signin/?status=accountcreated");
            exit;
        }
        else {
            header("Location:../register/?status=createfailed");
            exit;
        }
    }
    else {
        header("Location:../register/?status=passwordwronglength");
        exit;
    }
}
else if (isset($_POST['login'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $query1 = $db->prepare('SELECT Password, MemberId, FirstName, LastName FROM Member WHERE Email = ?');
        $query1->execute([$email]);
        $count = $query1->rowCount();
        $row = $query1->fetch();
        $password_h = $row['Password'];

        // If result matched $myusername and $mypassword, table row must be 1 row
        if ($count == 1 && password_verify($password, $password_h)) {
            initSession($row['MemberId'], $email, $row['FirstName'], $row['LastName']);

            if (isset($_POST['rememberme'])) {
                createCookie($row['MemberId']);
            }

            if (isset($_GET['from'])) {
                header("Location:" . $_GET['from']);
            }
            else {
                header("Location:../");
            }

            exit;
        }
        else {
            header("Location:../signin/?status=invalidcredentials");
            exit;
        }
    }
}
else if (isset($_POST['addkey'])) {
    $key = $_POST['key'];
    if ($key !== '') {
        try {
            $query = $db->prepare('INSERT INTO AccountKey(TheKey) VALUES (?)');
            $query->execute([ $key ]);

            header("Location:../admin/addkey.php?status=added");
            exit;
        }
        catch (PDOException $e) {
            header("Location:../admin/addkey.php?status=alreadyexists");
            exit;
        }
    }
    else {
        header("Location:../admin/addkey.php?status=blank");
        exit;
    }
}
else if (isset($_POST['addchallenge'])) {
    if ($_POST['postdate'] !== '' && $_POST['title'] !== '' && $_POST['description'] !== '') {
        if ($_POST['example'] === '') {
            $query = $db->prepare('INSERT INTO Challenge(Title, DatePosted, Difficulty, Description) VALUES (?, ?, ?, ?)');
            $query->execute([ $_POST['title'], $_POST['postdate'], $_POST['difficulty'], $_POST['description']]);
        }
        else {
            $query = $db->prepare('INSERT INTO Challenge(Title, DatePosted, Difficulty, Description, Example) VALUES (?, ?, ?, ?, ?)');
            $query->execute([ $_POST['title'], $_POST['postdate'], $_POST['difficulty'], $_POST['description'], $_POST['example']]);
        }
    }

    $query = $db->prepare('SELECT ChallengeId FROM Challenge WHERE DatePosted = ?');
    $query->execute([$_POST['postdate']]);

    $submitted = false;
    if ($query->rowCount() > 0) {
        $submitted = true;
    }

    if ($submitted == true) {
        header("Location:../admin/addchallenge.php?status=added");
        exit;
    }
    else {
        header("Location:../admin/addkey.php?status=failed");
        exit;
    }
}

// EOF
