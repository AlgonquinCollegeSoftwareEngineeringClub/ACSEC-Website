<?php

session_start();

if (session_destroy()) {
    header("Location:../signin/index.php?status=loggedout");
}

// EOF
