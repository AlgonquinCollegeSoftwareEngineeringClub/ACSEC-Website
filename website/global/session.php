<?php

require_once 'database.php';

function startSessionFromCookie() {
    session_start();

    // If user is not logged in.
    if (!isset($_SESSION['MemberId'])) {
        // See if they are logged in with a cookie.
        if (isset($_COOKIE["acsec"])) {
            $db = Database::getConnection();

            $query = $db->prepare('SELECT Email, FirstName, LastName FROM Member WHERE MemberId = ?');
            $query->execute( [$_COOKIE["acsec"]] );
            $row = $query->fetch();

            initSession($_COOKIE["acsec"], $row['Email'], $row['FirstName'], $row['LastName']);
        }
    }
}

function initSession($memberId, $email, $firstName, $lastName) {
    $_SESSION['MemberId'] = $memberId;
    $_SESSION['Email'] = $email;
    $_SESSION['FirstName'] = $firstName;
    $_SESSION['LastName'] = $lastName;
}

function createCookie($memberId) {
    // Set cookie to expire in ten years.
    $tenYears = 10 * 365 * 24 * 60 * 60;
    setCookie("acsec", $memberId, time() + $tenYears, '/');
}

function destroyCookie() {
    // This will time-out the cookie.
    setcookie("acsec", "", time() - 3600, '/');
}
