<?php

// Needed for destroyCookie().
require_once 'session.php';

session_start();

if (session_destroy()) {
    destroyCookie();
    header("Location:../signin/?status=loggedout");
}

// EOF
