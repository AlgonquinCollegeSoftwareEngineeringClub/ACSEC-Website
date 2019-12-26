<?php

function handleRegisterReturnStatus() {
    if (@$_GET['status'] == "emailalreadyexists")
        echoAlertFailure("Email already exists!");

    if (@$_GET['status'] == "weakpassword")
        echoAlertFailure("Password is too short!");

    if (@$_GET['status'] == "createfailed")
        echoAlertFailure("Could not create account!");

    // TODO: "exit" is undescriptive, find where it's being used and choose a
    // better name. Also the message (exit) tied to it doesn't provide any
    // meaning to the user.
    if (@$_GET['status'] == "exit")
        echoAlertFailure("Exit.");

    if (@$_GET['status'] == "keydoesntexist")
        echoAlertFailure("The given key does not exist!");

    if (@$_GET['status'] == "keyalreadyclaimed")
        echoAlertFailure("The given key has already been claimed!");

    if (@$_GET['status'] == "invalidemail")
        echoAlertFailure("You must provide a valid email address!");

    if (@$_GET['status'] == "passwordwronglength")
        echoAlertFailure("Password must be between 1 and 60 characters.");

    if (@$_GET['status'] == "blankname")
        echoAlertFailure("You must provide your first name.");

    if (@$_GET['status'] == "blanklastname")
        echoAlertFailure("You must provide your last name.");
}

function echoAlertFailure($message) {
    echo '<div class="alert alert-danger">';
    echo $message;
    echo '</div>';
}

function echoAlertSuccess($message) {
    echo '<div class="alert alert-success">';
    echo $message;
    echo '</div>';
}

// EOF
