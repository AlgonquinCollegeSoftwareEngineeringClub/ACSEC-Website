<?php

session_start();

if (session_destroy()) {
    header("Location:../signin/?status=loggedout");
}

// EOF
