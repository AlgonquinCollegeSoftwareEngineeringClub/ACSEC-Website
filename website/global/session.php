<?php

require_once 'database.php';

function startSessionFromCookie() {
    session_start();

    // If user is not logged in.
    if (!isset($_SESSION['MemberId'])) {
        // See if they are logged in with a cookie.
        if (isset($_COOKIE["acsec"])) {
            $db = Database::getConnection();

            date_default_timezone_set('America/Toronto');
            $today = date("Y-m-d");

            $query = $db->prepare('SELECT MemberId, Expire FROM Auth WHERE Token = ?');
            $query->execute([ $_COOKIE["acsec"] ]);
            $tokenExistsInDatabase = $query->rowCount() > 0;
            $data = $query->fetch();
            $tokenExpired = $today > $data['Expire'];
            $memberId = $data['MemberId'];

            if ($tokenExistsInDatabase && !$tokenExpired) {
                $query = $db->prepare('SELECT Email, FirstName, LastName FROM Member WHERE MemberId = ?');
                $query->execute([ $memberId ]);
                $row = $query->fetch();

                initSession($memberId, $row['Email'], $row['FirstName'], $row['LastName']);
                createCookie($memberId);
            }
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
    destroyCookie();

    $token = createToken($memberId);

    // Set cookie to expire in ten years.
    $tenYears = 10 * 365 * 24 * 60 * 60;
    setCookie("acsec", $token, time() + $tenYears, '/');
}

function createToken($memberId) {
    $token = bin2hex(openssl_random_pseudo_bytes(20));

    date_default_timezone_set('America/Toronto');
    $expire = date("Y-m-d", strtotime(date("Y-m-d", time()) . " + 365 day"));

    $db = Database::getConnection();

    $query = $db->prepare('INSERT INTO Auth(MemberId, Token, Expire) VALUES (?, ?, ?)');
    $query->execute([ $memberId, $token, $expire ]);

    return $token;
}

function destroyCookie() {
    if (isset($_COOKIE['acsec'])) {
        $db = Database::getConnection();

        $query = $db->prepare('DELETE FROM Auth WHERE Token = ?');
        $query->execute([ $_COOKIE['acsec'] ]);
    }

    // This will time-out the cookie.
    setcookie("acsec", "", time() - 3600, '/');
}

// EOF
